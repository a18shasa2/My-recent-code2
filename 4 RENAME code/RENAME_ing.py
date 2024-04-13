#!/usr/bin/env py

import os
arr = os.listdir('3x_speed_ING')
#arr.pop()
arr_zero = 0
arr_length = len(arr)

current_directory = os.getcwd()
new_directory = current_directory + '/3x_speed_ING'
os.chdir(new_directory)

while arr_zero < arr_length:
    output = "".join(arr[arr_zero])      

    #Split all including spaces
    data_list_split = list(output)
    
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    data_list_split.pop()
    
    output_joined = "".join(data_list_split)
    
    output_joined = output_joined + "ing.mp4"
    
    os.rename(arr[arr_zero],output_joined)
    
    print(output_joined)
    
    arr_zero = arr_zero + 1
    
