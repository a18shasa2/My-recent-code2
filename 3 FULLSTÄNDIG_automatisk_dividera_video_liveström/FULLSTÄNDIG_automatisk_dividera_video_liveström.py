#!/usr/bin/env py

#Input: Videos in folder "Movie". Output: Videos in folder "Movie_Cut".
#Prerequisities: "VideoSubFinder" and "Tesserect". Set Path to both. 
#New folders: "Movie", "Movie_Cut" and "Movie_Subtitles". 
#Run program in the folder "Release_x64".  

#Part 0: Indicate the input.
import os
livestream = os.listdir('Movie')
livestream_zero = 0
livestream_length = len(livestream)


while livestream_zero < livestream_length:
    #PART1: VideoSubFinder automatization using command prompt shell.
    print("Frames are generating. Wait.")
    os.system(f'VideoSubFinderWXW.exe -c -r -ccti -i Movie/{livestream[livestream_zero]} -be 0.07 -te 0.27')

    #Part 2: Converting the black-white images to text-files using OCR tesserect.
    arr = os.listdir('TXTImages')
    arr_zero = 0
    arr_length = len(arr)


    while arr_zero < arr_length:
        arr_txt = arr[arr_zero] + ".txt"
        os.system(f'tesseract TXTImages/{arr[arr_zero]} TXTResults/{arr_txt}')
        arr_zero = arr_zero + 1
        

    #PART 3: Removes illegal symbols in the existing txt-files and makes all lines be on one line. 
    #Acquires all filenames in current folder
    arr = os.listdir('TXTResults')
    arr_zero = 0
    arr_length = len(arr)

    current_directory = os.getcwd()
    new_directory = current_directory + '/TXTResults'
    os.chdir(new_directory)

    while arr_zero < arr_length:
        data_list = []
        data_list_split_removed = []

        #Read all lines from subtitle file
        with open(arr[arr_zero],'r') as f:
            for line in f:
                for word in line.split():
                   data_list.append(word)
                   
        output = " ".join(data_list)      

        #Split all including spaces
        data_list_split = list(output)     

        #Remove symbols and replace the existing srt-file
        data_list_length = len(data_list_split)
        beg_while3 = 0
        while beg_while3 < data_list_length:
            if data_list_split[beg_while3] == '?':
                data_list_split_removed.insert(0, 'QUESTION ')
                
            if data_list_split[beg_while3] == 'Q':
                data_list_split_removed.insert(0, 'QUESTION ')

            if data_list_split[beg_while3] == '|':
                data_list_split_removed.append('I')
            
            if data_list_split[beg_while3] != ':' and data_list_split[beg_while3] != '/' and data_list_split[beg_while3] != '"' and data_list_split[beg_while3] != '!' and data_list_split[beg_while3] != '?' and data_list_split[beg_while3] != '*' and data_list_split[beg_while3] != '.' and data_list_split[beg_while3] != ',' and data_list_split[beg_while3] != '|' and data_list_split[beg_while3] != '@' and data_list_split[beg_while3] != '$' and data_list_split[beg_while3] != '”' and data_list_split[beg_while3] != '©' and data_list_split[beg_while3] != '<' and data_list_split[beg_while3] != '>':
                data_list_split_removed.append(data_list_split[beg_while3])
            beg_while3 = beg_while3 + 1

        with open(arr[arr_zero], 'w+') as f:
            for items in data_list_split_removed:
                f.write('%s' %items)

        arr_zero = arr_zero + 1
         
    os.chdir(current_directory)
        
    #PART3.5: VideoSubFinder export subtitles.
    livestream_srt = livestream[livestream_zero] + ".srt"
    os.system(f'VideoSubFinderWXW.exe -cstxt Movie_Subtitles/{livestream_srt}')

    #PART 4: Extract the videos.
    from collections import defaultdict
    import srt
    from moviepy.editor import VideoFileClip

    current_directory = os.getcwd()
    Cut_directory = current_directory + '/Movie_Cut'
    os.chdir(Cut_directory)
    os.system(f'mkdir {livestream[livestream_zero]}')
    new_livestream_folder_directory = current_directory + '/Movie_Cut/' + livestream[livestream_zero]
    os.chdir(new_livestream_folder_directory)

    video_file_path = "../../Movie/" + livestream[livestream_zero]
    
    subtitle_file_path = "../../Movie_Subtitles/" + livestream_srt

    with open(subtitle_file_path, encoding="utf-8") as f:
        text = f.read()
    clip = VideoFileClip(video_file_path)
    line_counter = defaultdict(int)  # line count tracker

    for sub in srt.parse(text):
        line_counter[sub.content] += 1

        if line_counter[sub.content] > 1:  # <subtitle>_<count>.mp4
            filename = f"{sub.content.strip()}_{line_counter[sub.content]}.mp4"
        else:  # <subtitle>.mp4
            filename = f"{sub.content.strip()}.mp4"

        # make a cut and save it to a file
        start, end = sub.start, sub.end
        if end < start:
            start, end = end, start
        subclip = clip.subclip(start.total_seconds(), end.total_seconds())
        subclip.write_videofile(filename)


    #os.system(f'mkdir {livestream[livestream_zero]}')
    os.chdir(current_directory)
    
    livestream_zero = livestream_zero + 1

print("\n The program is finished. \n")