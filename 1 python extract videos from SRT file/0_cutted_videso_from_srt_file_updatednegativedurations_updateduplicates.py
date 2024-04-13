#!/usr/bin/env py

# install srt package and moviepy package
# CHANGE katerina.mkv AND katerina.srt
# cd (filepath to current file)
# py (pythonprogram)
# mp4 files will be exported to current folder

from collections import defaultdict
import srt
from moviepy.editor import VideoFileClip

with open("idle.srt", encoding="utf-8") as f:
    text = f.read()
clip = VideoFileClip("idle_ver2_05sec.mp4")
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
