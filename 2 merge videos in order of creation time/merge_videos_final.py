#!/usr/bin/env py

#Place the videos and this program inside a folder, and then run this program. 
#Prequisite: FFMPEG, which should be set to path. 

#sort files in current directory based on creation date.
import os
import shutil

cut_extracted_videos = os.listdir()
cut_extracted_videos.sort(key=os.path.getmtime)
cut_extracted_videos_zero = 0
cut_extracted_videos_length = len(cut_extracted_videos)
cut_extracted_videos_array = []
cut_extracted_videos_array_individual = []

this_folder_directory = os.getcwd()

while cut_extracted_videos_zero < cut_extracted_videos_length:
    if cut_extracted_videos[cut_extracted_videos_zero] != 'merge_videos_final.py' and cut_extracted_videos[cut_extracted_videos_zero] != 'mylist.txt' and cut_extracted_videos[cut_extracted_videos_zero] != 'delete_separate_videos' and cut_extracted_videos[cut_extracted_videos_zero] != 'merged_videos_export': 

        #Remove illegal symbols
        data_list_split_removed = []
        data_list_split = []
        output = cut_extracted_videos[cut_extracted_videos_zero]
        for letter in output:
            data_list_split.append(letter)
        data_list_length = len(data_list_split)
        beg_while3 = 0
        while beg_while3 < data_list_length:   
            if data_list_split[beg_while3] == ' ' or data_list_split[beg_while3] == '#':
                data_list_split_removed.append('_')
            
            if data_list_split[beg_while3] == "'":
                data_list_split_removed.append('_')
             
            if data_list_split[beg_while3] != ':' and data_list_split[beg_while3] != '/' and data_list_split[beg_while3] != '"' and data_list_split[beg_while3] != "'" and data_list_split[beg_while3] != '!' and data_list_split[beg_while3] != '?' and data_list_split[beg_while3] != '*' and data_list_split[beg_while3] != ',' and data_list_split[beg_while3] != '|' and data_list_split[beg_while3] != '@' and data_list_split[beg_while3] != '$' and data_list_split[beg_while3] != '”' and data_list_split[beg_while3] != '©' and data_list_split[beg_while3] != '<' and data_list_split[beg_while3] != '>' and data_list_split[beg_while3] != ' ' and data_list_split[beg_while3] != '#':
                data_list_split_removed.append(data_list_split[beg_while3])
            beg_while3 = beg_while3 + 1
        output_seq = "".join(data_list_split_removed)
        os.rename(cut_extracted_videos[cut_extracted_videos_zero], output_seq)
        
        cut_extracted_videos_array_individual.append(output_seq)
        
        #Write mylists.txt file
        cut_extract_video_file = "file '" + output_seq + "'"
        cut_extracted_videos_array.append(cut_extract_video_file)
        
    cut_extracted_videos_zero = cut_extracted_videos_zero + 1
        
with open('mylist.txt', 'w+') as f:
    for items in cut_extracted_videos_array:
        f.write('%s\n' %items)

os.system(f'mkdir delete_separate_videos')
#os.system(f'mkdir merged_videos_export')

cut_extracted_videos_array_individual_full = "QUESTION_FULL_MERGED_" + cut_extracted_videos_array_individual[0]

print(cut_extracted_videos_array_individual_full)

#The videos are merged here.
os.system(f'ffmpeg -f concat -safe 0 -i mylist.txt -c copy ../{cut_extracted_videos_array_individual_full}')
#os.system(f'ffmpeg -f concat -safe 0 -i mylist.txt -c copy merged_videos_export/{cut_extracted_videos_array_individual_full}')


#The videos are moved to another folder.
cut_extracted_videos_array_individual_zero = 0
cut_extracted_videos_array_individual_length = len(cut_extracted_videos_array_individual)
while cut_extracted_videos_array_individual_zero < cut_extracted_videos_array_individual_length:
    from_folder_directory = cut_extracted_videos_array_individual[cut_extracted_videos_array_individual_zero]
    to_folder_directory = "delete_separate_videos/" + cut_extracted_videos_array_individual[cut_extracted_videos_array_individual_zero]
    shutil.move(from_folder_directory, to_folder_directory)
    
    cut_extracted_videos_array_individual_zero = cut_extracted_videos_array_individual_zero + 1
    
print("\nThis program is finished.")



