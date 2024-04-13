#This program converts the black-white images to text-files using OCR tesserect, which needs to be pre-installed and set to path ("system variables").
import os
arr = os.listdir('TXTImages')
#arr.pop()
arr_zero = 0
arr_length = len(arr)


while arr_zero < arr_length:
    arr_txt = arr[arr_zero] + ".txt"
    os.system(f'tesseract TXTImages/{arr[arr_zero]} TXTResults/{arr_txt}')
    arr_zero = arr_zero + 1
    
