#!/usr/bin/env py

#Input: Videos in folder "Movie". Output: Videos in folder "Movie_Cut".
#Prerequisities: "VideoSubFinder" and "Tesseract". Set Path to both. 
#New folders: "Movie", "Movie_Cut" and "Movie_Subtitles". 
#Run program in the folder "Release_x64". 
#INSTALL PYTHON PACKAGE CODE: py -m pip install srt moviepy

#Part 0: Indicate the input.
import re
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
        with open(arr[arr_zero],'r', encoding="utf-8") as f:
            for line in f:
                for word in line.split():
                   data_list.append(word)
                   
        output = " ".join(data_list)      

        #Split all including spaces
        data_list_split = list(output)     

        #Remove symbols and replace the existing srt-file
        data_list_length = len(data_list_split)
        beg_while3 = 0
        question_number_checker = 0   
        zero_var = 0
        while beg_while3 < data_list_length:
            #if data_list_split[beg_while3] == '?' and question_number_checker == zero_var:
            #    data_list_split_removed.insert(0, 'QUESTION ')
            #    question_number_checker = question_number_checker + 1                
                
            #if data_list_split[beg_while3] == 'Q' and question_number_checker == zero_var:
            #    data_list_split_removed.insert(0, 'QUESTION ')
            #    question_number_checker = question_number_checker + 1  

            if data_list_split[beg_while3] == '?':
                data_list_split_removed.append('Q')

            if data_list_split[beg_while3] == '|':
                data_list_split_removed.append('I')

            beg_while3_next = beg_while3 + 1
                
            if data_list_split[beg_while3] == ' ' and data_list_split[beg_while3_next] != ' ':               
                data_list_split_removed.append(' ')
            
            if data_list_split[beg_while3] == 'A' or data_list_split[beg_while3] == 'a' or data_list_split[beg_while3] == 'B' or data_list_split[beg_while3] == 'b' or data_list_split[beg_while3] == 'C' or data_list_split[beg_while3] == 'c' or data_list_split[beg_while3] == 'D' or data_list_split[beg_while3] == 'd' or data_list_split[beg_while3] == 'E' or data_list_split[beg_while3] == 'e' or data_list_split[beg_while3] == 'F' or data_list_split[beg_while3] == 'f' or data_list_split[beg_while3] == 'G' or data_list_split[beg_while3] == 'g' or data_list_split[beg_while3] == 'H' or data_list_split[beg_while3] == 'h' or data_list_split[beg_while3] == 'I' or data_list_split[beg_while3] == 'i' or data_list_split[beg_while3] == 'J' or data_list_split[beg_while3] == 'j' or data_list_split[beg_while3] == 'K' or data_list_split[beg_while3] == 'k' or data_list_split[beg_while3] == 'L' or data_list_split[beg_while3] == 'l' or data_list_split[beg_while3] == 'M' or data_list_split[beg_while3] == 'm' or data_list_split[beg_while3] == 'N' or data_list_split[beg_while3] == 'n' or data_list_split[beg_while3] == 'O' or data_list_split[beg_while3] == 'o' or data_list_split[beg_while3] == 'P' or data_list_split[beg_while3] == 'p' or data_list_split[beg_while3] == 'Q' or data_list_split[beg_while3] == 'q' or data_list_split[beg_while3] == 'R' or data_list_split[beg_while3] == 'r' or data_list_split[beg_while3] == 'S' or data_list_split[beg_while3] == 's' or data_list_split[beg_while3] == 'T' or data_list_split[beg_while3] == 't' or data_list_split[beg_while3] == 'U' or data_list_split[beg_while3] == 'u' or data_list_split[beg_while3] == 'V' or data_list_split[beg_while3] == 'v' or data_list_split[beg_while3] == 'X' or data_list_split[beg_while3] == 'x' or data_list_split[beg_while3] == 'Y' or data_list_split[beg_while3] == 'y' or data_list_split[beg_while3] == 'Z' or data_list_split[beg_while3] == 'z':
            #if data_list_split[beg_while3] != ':' and data_list_split[beg_while3] != '/' and data_list_split[beg_while3] != '"' and data_list_split[beg_while3] != '!' and data_list_split[beg_while3] != '?' and data_list_split[beg_while3] != '*' and data_list_split[beg_while3] != '.' and data_list_split[beg_while3] != ',' and data_list_split[beg_while3] != '|' and data_list_split[beg_while3] != '@' and data_list_split[beg_while3] != '$' and data_list_split[beg_while3] != '”' and data_list_split[beg_while3] != '©' and data_list_split[beg_while3] != '<' and data_list_split[beg_while3] != '>':
                data_list_split_removed.append(data_list_split[beg_while3])
            beg_while3 = beg_while3 + 1

        with open(arr[arr_zero], 'w+', encoding="utf-8") as f:
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


        #If the file name has too many symbols, only keep first half. 
        #filename = filename.replace(' ', '_')
        if re.search(r'[Q]', filename):
            filename = "QUESTION " + filename    
        filename_first_half = filename[0:int(len(filename)/2)]
        filename_number = len(filename)
        if filename_number > 120:
            filename = filename_first_half + ".mp4"

        if filename_number > 120 and line_counter[sub.content] > 1:
            filename = filename_first_half + "_" + str(line_counter[sub.content]) + ".mp4"


        # make a cut and save it to a file
        start, end = sub.start, sub.end
        if end < start:
            start, end = end, start
        subclip = clip.subclip(start.total_seconds(), end.total_seconds())
        
        start_seconds_time = start.total_seconds()
        end_seconds_time = end.total_seconds()
        difference_seconds_time = end_seconds_time - start_seconds_time

        if difference_seconds_time > 5:        
            subclip.write_videofile(filename)


    #os.system(f'mkdir {livestream[livestream_zero]}')
    os.chdir(current_directory)
    
    livestream_zero = livestream_zero + 1

print("\n The program is finished. \n")