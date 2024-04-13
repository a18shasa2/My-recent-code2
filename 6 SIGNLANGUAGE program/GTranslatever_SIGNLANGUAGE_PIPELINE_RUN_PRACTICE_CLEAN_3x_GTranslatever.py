#!/usr/bin/env py

import os

#PART 1: Load the inputted subtitle-file and video-file.
#NOTE: Input folders are "movie_raw" and "subtitles_raw". Output folder is "EXPORT".
subtitle_video_list_files = os.listdir('subtitles_raw')
subtitles_list_value = 0
subtitles_raw_path = "subtitles_raw/" + subtitle_video_list_files[subtitles_list_value]
movie_video_list_files = os.listdir('movie_raw')
subtitle_video_list_files_length = len(subtitle_video_list_files)

#The required python-packages are installed, if they have not already been installed.
os.system('py -m pip install srt moviepy')


while subtitles_list_value < subtitle_video_list_files_length:
    os.system(f'copy subtitles_raw/{subtitle_video_list_files[subtitles_list_value]} {subtitle_video_list_files[subtitles_list_value]}') 

    input_sentence = input('Write the sentence:\n')
     
    src=open(subtitle_video_list_files[subtitles_list_value],"r") 
    fline="0\n00:00:00,000 --> 00:00:00,000\n" + input_sentence + "\n\n"
    oline=src.readlines() 
    oline.insert(0,fline) 
    #oline.insert(1,input_sentence)     
    src.close()  
    src=open(subtitle_video_list_files[subtitles_list_value],"w") 
    src.writelines(oline) 
    src.close() 

    stopper_input_sentence = input('\n')

    import srt
    with open(subtitle_video_list_files[subtitles_list_value], encoding="utf-8") as f:
        text = f.read()
    subcontentlist = []
    subcontentlistword = []
    subcontentlistwordremoved = []
    new_subs = []
    last_sub = None
    counter = 0  
    for sub in srt.parse(text):
        counter += 1
        if last_sub is not None:
            time_difference_decimal = (sub.start - last_sub.end).total_seconds()
            idle_title_var = "idle_" + str(time_difference_decimal)
            idle_title_var = idle_title_var.replace(".", "")
            
            #NOTE: To change the idle time duration, change "> 3.5" below. 
            if time_difference_decimal > 3.5:
                stops = " ".join([idle_title_var] * 1)
                srt.Subtitle(counter, sub.start, sub.end, sub.content)
                new_subs.append(srt.Subtitle(counter, last_sub.end, sub.start, stops))
                counter += 1
                
                os.system(f'ffmpeg -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {time_difference_decimal} 3x_speed/{idle_title_var}.mp4')

                
        
        new_subs.append(srt.Subtitle(counter, sub.start, sub.end, sub.content))
        last_sub = sub
           
    print("\nThe clips are generating. Wait.")

    #PART 2: Illegal symbols are removed.           
    for sub in new_subs:
        subcontentitem = sub.content
        for word in subcontentitem.split():
            word_lower_ver = word.lower()

            if word_lower_ver == "i":
                subcontentlistword.append('I')
                
            if word_lower_ver == "that's":
                subcontentlistword.append('that')
                subcontentlistword.append('is')
                
            if word_lower_ver == "today's":
                subcontentlistword.append('today')
                subcontentlistword.append('is')
                
            if word_lower_ver == "he's":
                subcontentlistword.append('he')
                subcontentlistword.append('is')
                
            if word_lower_ver == "I'm":
                subcontentlistword.append('I')
                subcontentlistword.append('am')
                
            if word_lower_ver == "didn't":
                subcontentlistword.append('did')
                subcontentlistword.append('not')
                
            if word_lower_ver == "don't":
                subcontentlistword.append('do')
                subcontentlistword.append('not')

            if word_lower_ver == "haven't":
                subcontentlistword.append('have')
                subcontentlistword.append('not')

            if word_lower_ver != "don't" and word_lower_ver != "haven't" and word_lower_ver != "i" and word_lower_ver != "didn't" and word_lower_ver != "I'm" and word_lower_ver != "he's" and word_lower_ver != "today's" and word_lower_ver != "that's":
                subcontentlistword.append(word_lower_ver)
                
        subcontentlist.append(subcontentitem)


    beg_while2 = 0
    data_list_length_total = len(subcontentlistword)
    while beg_while2 < data_list_length_total:
        data_list_split = []
        data_list_split_removed = []
        
        data_list_split = list(subcontentlistword[beg_while2])  

        
        data_list_length = len(data_list_split)
        beg_while3 = 0
        while beg_while3 < data_list_length:
            if data_list_split[beg_while3] == '|':
                data_list_split_removed.append('I')
            
            if data_list_split[beg_while3] != ':' and data_list_split[beg_while3] != '/' and data_list_split[beg_while3] != '"' and data_list_split[beg_while3] != "'" and data_list_split[beg_while3] != '!' and data_list_split[beg_while3] != '?' and data_list_split[beg_while3] != '*' and data_list_split[beg_while3] != '.' and data_list_split[beg_while3] != ',' and data_list_split[beg_while3] != '|' and data_list_split[beg_while3] != '@' and data_list_split[beg_while3] != '$' and data_list_split[beg_while3] != '”' and data_list_split[beg_while3] != '©' and data_list_split[beg_while3] != '<' and data_list_split[beg_while3] != '>':
                data_list_split_removed.append(data_list_split[beg_while3])
            beg_while3 = beg_while3 + 1
        output = "".join(data_list_split_removed)
        subcontentlistwordremoved.append(output)
        beg_while2 = beg_while2 + 1


    with open('3x_speed_Test_Results5.txt', 'w+') as f:
        for items in subcontentlistwordremoved:
            f.write('%s\n' %items)


    #PART 3: Sign language-video is generated.
    import srt

    current_directory = os.getcwd()
    sign_language_clips_directory = current_directory + "/3x_speed"

    from moviepy.editor import VideoFileClip, concatenate_videoclips

    os.chdir(sign_language_clips_directory)

    paths = []
    with open("../3x_speed_Test_Results5.txt", encoding="utf-8") as f:
        for name in f:
            filename = name.strip() + ".mp4"
            if os.path.exists(filename):
                paths.append(VideoFileClip(filename))
                

    os.chdir(current_directory)

    final = concatenate_videoclips(paths)
    final.write_videofile("3x_35_speed_video.mp4")

    os.system(f'ffmpeg -i 3x_35_speed_video.mp4 -filter:v "crop=iw/1.2:ih/1.5:x:20" output_cropped10.mp4')

    #PART 4: Sign language-video is embedded.
    output = "".join(movie_video_list_files[subtitles_list_value])      
    data_list_split = list(output)    
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    output_joined = "".join(data_list_split)
    output_joined = output_joined + "_signlanguage.mp4"

    os.system(f'ffmpeg -i movie_raw/{movie_video_list_files[subtitles_list_value]} -vf "movie=output_cropped10.mp4, scale=200: -1 [inner]; [in][inner] overlay=main_w-(overlay_w+10):main_h-(overlay_h+10) [out]" EXPORT/{output_joined}')

    os.system(f'del {subtitle_video_list_files[subtitles_list_value]}')
    os.system(f'del output_cropped10.mp4')
    os.system(f'del 3x_35_speed_video.mp4')
    os.system(f'del 3x_speed_Test_Results5.txt')

    subtitles_list_value = subtitles_list_value + 1

print("\nThe program is finished.")