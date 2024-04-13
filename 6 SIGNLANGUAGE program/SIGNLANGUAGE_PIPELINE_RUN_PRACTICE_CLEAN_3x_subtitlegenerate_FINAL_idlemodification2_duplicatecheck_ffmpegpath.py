#!/usr/bin/env py

import os

#PART 0: From audio to subtitle-file. If a subtitle file does not already exist, then one is created for the video from scratch. 
#input_var = input('Does a subtitle-file exist for the video? (Yes/No)\n')
input_var = "Yes"
if input_var == "No":
    os.system('py -m pip install assemblyai')
    print("\nThe subtitle file is generating. Wait.")
    import assemblyai as aai

    aai.settings.api_key = "1cac3ae3d7c04ce985f53410db6dfed2"
    transcriber = aai.Transcriber()

    transcript = transcriber.transcribe("movie_raw/demo1_empty_raw.mp4")
    #transcript = transcriber.transcribe("https://storage.googleapis.com/aai-web-samples/news.mp4")
    #transcript = transcriber.transcribe("./my-local-audio-file.wav")

    subtitles_transcribed_audio_export = transcript.export_subtitles_srt()

    #print(transcript.text)
    #print(subtitles_transcribed_audio_export)

    subtitles_transcribed_audio_file = open("subtitles_raw/subtitles_transcribed_audio_theoep3.srt", "w+")
    subtitles_transcribed_audio_file.write(subtitles_transcribed_audio_export)
    subtitles_transcribed_audio_file.close()
    input_var2 = input('Check the generated subtitle-file in a text editor. Press enter when you want to continue.\n')
    
    
#PART 1: Load the inputted subtitle-file and video-file.
#NOTE: Input folders are "movie_raw" and "subtitles_raw". Output folder is "EXPORT".
ffmpeg_path_directory = '"ffmpeg_6.1_essentials_build/bin/ffmpeg.exe"'

subtitle_video_list_files = os.listdir('subtitles_raw')
subtitles_list_value = 0
subtitles_raw_path = "subtitles_raw/" + subtitle_video_list_files[subtitles_list_value]
movie_video_list_files = os.listdir('movie_raw')
subtitle_video_list_files_length = len(subtitle_video_list_files)

#The required python-packages are installed, if they have not already been installed.
os.system('py -m pip install srt moviepy')


while subtitles_list_value < subtitle_video_list_files_length:
    os.system(f'copy subtitles_raw/{subtitle_video_list_files[subtitles_list_value]} {subtitle_video_list_files[subtitles_list_value]}') 
     
    src=open(subtitle_video_list_files[subtitles_list_value],"r") 
    fline="0\n00:00:00,000 --> 00:00:00,000\n\n\n" 
    oline=src.readlines() 
    oline.insert(0,fline) 
    src.close()  
    src=open(subtitle_video_list_files[subtitles_list_value],"w") 
    src.writelines(oline) 
    src.close() 

    import srt
    with open(subtitle_video_list_files[subtitles_list_value], encoding="utf-8") as f:
        text = f.read()
    subcontentlist = []
    subcontentlistword = []
    subcontentlistwordremoved = []
    idle_name_list = []
    idle_time_list = []
    idle_time_list_edited_temp = [] 
    idle_time_list_edited_final = []     
    subtitle_duration_list = []
    sum_word_sum_temp = []
    sum_word_sum_final = []
    sum_word_sum_final_edited = []    
    new_subs = []
    last_sub = None
    counter = 0 
    id_val_check_counter = 1     
    for sub in srt.parse(text):
        counter += 1
        if last_sub is not None:
            time_difference_decimal = (sub.start - last_sub.end).total_seconds()
            idle_title_var = "idle_" + str(time_difference_decimal)
            idle_title_var = idle_title_var.replace(".", "")
            
            #NOTE: To change the idle time duration, change "> 3.5" below. 
            if time_difference_decimal > 3.2:
                stops = " ".join([idle_title_var] * 1)
                srt.Subtitle(counter, sub.start, sub.end, sub.content)
                new_subs.append(srt.Subtitle(counter, last_sub.end, sub.start, stops))
                counter += 1               
                
                idle_name_list.append(idle_title_var)
                idle_time_list.append(time_difference_decimal)
                time_difference_decimal_subtitleduration = (sub.end - sub.start).total_seconds()
                #time_difference_decimal_subtitleduration = (last_sub.start - last_sub.end).total_seconds()                
                subtitle_duration_list.append(time_difference_decimal_subtitleduration)
                if id_val_check_counter > 1:
                    time_difference_decimal_subtitleduration_editedver = (idle_time_list_edited_temp[-1] - idle_time_list_edited_temp[0]).total_seconds()
                    if time_difference_decimal_subtitleduration_editedver > 0:                    
                        idle_time_list_edited_final.append(time_difference_decimal_subtitleduration_editedver)
                idle_time_list_edited_temp.clear()
                idle_time_list_edited_temp.append(sub.start)
                
                id_val_check_counter = id_val_check_counter + 1                 

                
                os.system(f'"{ffmpeg_path_directory}" -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {time_difference_decimal} 3x_speed/{idle_title_var}.mp4')
            else:
                idle_time_list_edited_temp.append(sub.end)
                #idle_time_list.append("")              
                #subtitle_duration_list.append("")               
        
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


    ##DUPLICATES CHECK IN IDLE (STEP 1) ADD BEFORE THE TXT-genertion file for subcontentremoved
    ##START
    import re
    #idle_name_list.insert(0, "idle_200")
    #subcontentlistwordremoved.insert(0, "idle_200")    
    #print(idle_name_list)
    idle_name_list_duplicatever = [(x if i == idle_name_list.index(x) else x + "_" + str(idle_name_list.count(x) - idle_name_list[i + 1:].count(x))) for i, x in enumerate(idle_name_list)]

    idle_name_list = [(x if i == idle_name_list.index(x) else x + "_" + str(idle_name_list.count(x) - idle_name_list[i + 1:].count(x))) for i, x in enumerate(idle_name_list)]

    #print(idle_name_list)
    #print(idle_name_list_duplicatever)
    #print(subcontentlistwordremoved)
    ##END

    ##DUPLICATES CHECK IN IDLE (STEP 2) START
    arr_zero_val_duplicatever = 0
    for i, n in enumerate(subcontentlistwordremoved):
        regexp = re.compile(r'idle_')
        if regexp.search(subcontentlistwordremoved[i]):
            subcontentlistwordremoved[i] = idle_name_list_duplicatever[arr_zero_val_duplicatever]
            arr_zero_val_duplicatever = arr_zero_val_duplicatever + 1        

    #print(subcontentlistwordremoved)
    #input_var = input('Does a subtitle-file exist for the video? (Yes/No)\n') 
    ##END


    with open('3x_speed_Test_Results5.txt', 'w+') as f:
        for items in subcontentlistwordremoved:
            f.write('%s\n' %items)

    
    #PART 3.3: IDLE ADJUST. RE WORD
    import re

    arr_zero = 0
    arr_length = len(subcontentlistwordremoved)

    while arr_zero < arr_length:
        regexp = re.compile(r'idle')
        if regexp.search(subcontentlistwordremoved[arr_zero]):
          word_sum_sum = sum(sum_word_sum_temp)
          sum_word_sum_final.append(word_sum_sum)
          sum_word_sum_temp.clear()
        else:
          word_video = "3x_speed/" + subcontentlistwordremoved[arr_zero] + ".mp4" 
          from moviepy.editor import VideoFileClip
          #print(word_video)
          if os.path.exists(word_video):
            #print("Present")
            clip = VideoFileClip(word_video)
            word_video_duration = clip.duration 
            sum_word_sum_temp.append(word_video_duration)            
          #else:
            #print("Absent")                  
        arr_zero = arr_zero + 1    
    

    #PART 3.4: sum_word_sum_final_EDITED. 
    #sum_word_sum_final.pop(0)
    #arr_zero = 0
    #arr_length = len(sum_word_sum_final)
    #while arr_zero < arr_length:  
    #    if sum_word_sum_final[arr_zero] < idle_time_list[arr_zero]:     
    #      sum_word_sum_final_edited.append(sum_word_sum_final[arr_zero])
    #    arr_zero = arr_zero + 1            

    #PART 3.5: IDLE ADJUST. ADD HERE.  
    sum_word_sum_final.pop(0)    
    print(sum_word_sum_final)    
    print(subtitle_duration_list)
    idle_time_list.pop(0)
    idle_name_list.pop(0)    
    print(idle_time_list)
    print(idle_name_list) 
    print(idle_time_list_edited_final)     
    #input_var = input('Does a subtitle-file exist for the video? (Yes/No)\n')   
    arr_zero = 0
    arr_zero_edited = 0    
    arr_length = len(idle_name_list)
    while arr_zero < arr_length:
    
        #if sum_word_sum_final[arr_zero] > idle_time_list[arr_zero]: 
          #arr_zero_edited = arr_zero + 1        
    
        #NOTE: BEG sumsum "<" and "-" diff is optinal. Will get increased. May get removed. 
        if sum_word_sum_final[arr_zero] < subtitle_duration_list[arr_zero] and sum_word_sum_final[arr_zero] < idle_time_list[arr_zero]:
          new_difference = sum_word_sum_final[arr_zero] - subtitle_duration_list[arr_zero]
          new_idle = idle_time_list[arr_zero] - new_difference  

          if new_idle > 0:
            os.system(f'"{ffmpeg_path_directory}" -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {new_idle} 3x_speed/{idle_name_list[arr_zero]}.mp4')          
        #END optional
            
        if sum_word_sum_final[arr_zero] > subtitle_duration_list[arr_zero] and sum_word_sum_final[arr_zero] < idle_time_list[arr_zero]:
          new_difference = sum_word_sum_final[arr_zero] - subtitle_duration_list[arr_zero]
          new_idle = idle_time_list[arr_zero] - new_difference  

          if new_idle > 0:
            os.system(f'"{ffmpeg_path_directory}" -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {new_idle} 3x_speed/{idle_name_list[arr_zero]}.mp4')          
        
          #if sum_word_sum_final[arr_zero] < idle_time_list[arr_zero]:         
          #  new_difference = sum_word_sum_final[arr_zero] - subtitle_duration_list[arr_zero]
          #  new_idle = idle_time_list[arr_zero] - new_difference 

        if sum_word_sum_final[arr_zero] > subtitle_duration_list[arr_zero] and sum_word_sum_final[arr_zero] > idle_time_list[arr_zero]: 
          #new_difference = sum_word_sum_final[arr_zero] - subtitle_duration_list[arr_zero]        
          #new_difference_two = new_difference - idle_time_list_edited_final[arr_zero_edited]
          #new_idle = idle_time_list[arr_zero] - new_difference_two 
          #new_idle = new_difference_two
          #new_idle = sum_word_sum_final[arr_zero] - idle_time_list_edited_final[arr_zero_edited]
          new_idle = idle_time_list[arr_zero] - (sum_word_sum_final[arr_zero] - idle_time_list_edited_final[arr_zero_edited])          
          #new_idle = (idle_time_list[arr_zero] - (sum_word_sum_final[arr_zero] - idle_time_list_edited_final[arr_zero_edited])) + subtitle_duration_list[arr_zero]           
          arr_zero_edited = arr_zero_edited + 1
              
          #print(new_idle)
          if new_idle > 0:
            os.system(f'"{ffmpeg_path_directory}" -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {new_idle} 3x_speed/{idle_name_list[arr_zero]}.mp4')
            
        #if sum_word_sum_final[arr_zero] < subtitle_duration_list[arr_zero]:
        #  new_difference = sum_word_sum_final[arr_zero] - subtitle_duration_list[arr_zero]
        #  new_idle = idle_time_list[arr_zero] + new_difference 
        #  print(new_idle)
        #  if new_idle > 0:
        #    os.system(f'"{ffmpeg_path_directory}" -y -stream_loop -1 -i 3x_speed/idle_1frame.mp4 -c copy -t {new_idle} 3x_speed/{idle_name_list[arr_zero]}.mp4')        
        
        arr_zero = arr_zero + 1             


    print("\nThe clips are generating. Wait.")

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

    os.system(f'"{ffmpeg_path_directory}" -i 3x_35_speed_video.mp4 -filter:v crop=iw/1.2:ih/1.5:x:20 output_cropped10.mp4')

    #PART 4: Sign language-video is embedded.
    output = "".join(movie_video_list_files[subtitles_list_value])      
    data_list_split = list(output)    
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    output_joined = "".join(data_list_split)
    output_joined = output_joined + "_signlanguage.mp4"

    os.system(f'"{ffmpeg_path_directory} -i movie_raw/{movie_video_list_files[subtitles_list_value]} -vf "movie=output_cropped10.mp4, scale=200: -1 [inner]; [in][inner] overlay=main_w-(overlay_w+10):main_h-(overlay_h+10) [out]" EXPORT/{output_joined}"')

    os.system(f'del {subtitle_video_list_files[subtitles_list_value]}')
    os.system(f'del output_cropped10.mp4')
    os.system(f'del 3x_35_speed_video.mp4')
    os.system(f'del 3x_speed_Test_Results5.txt')

    subtitles_list_value = subtitles_list_value + 1

print("\nThe program is finished.")