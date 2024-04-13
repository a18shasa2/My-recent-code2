#!/usr/bin/env py

import os
videos = os.listdir('1x_speed')
videos_zero = 0
videos_length = len(videos)

#PTS val = 0.36 = 1 / 2.75 (speed is 2.75)
while videos_zero < videos_length:
    os.system(f'ffmpeg -i 1x_speed/{videos[videos_zero]} -filter_complex "[0:v]setpts=0.333*PTS[v]" -map "[v]" 31x_speed/{videos[videos_zero]}')
    #OLD VER DELETE os.system(f'ffmpeg -i One_speed/{videos[videos_zero]} -filter:v "setpts=0.363636*PTS" Triple_speed/{videos[videos_zero]}')
    videos_zero = videos_zero + 1
    
print("\nThe program is finished.")