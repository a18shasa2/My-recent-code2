#!/usr/bin/env py

#Python code install:
#(in command prompt)
#py -m pip install flask nltk six

#*py* (drag and drop file to command prompt to make the file path appear in command prompt)

#(install all text from requirements.txt-file)
#py -m pip install -r requirements.txt


#comment
print('Hello World!')
print('The cow said "Moo"!')
print(type(7))
sequence = "CATGACTCTACGCAGTCATTCAGCAG";
n = 17 
print(n)
print(type(n))
print('The number is: ', n, '!')

#concatenation
exon1 = "ACTAAATAGAGATTA"
exon2 = 'ATATTAATTGAA'
mRNA = exon1 + exon2

#plus arithmetic
sample1_RNA_ng = 87
sample2_RNA_ng = 98
total_ng = sample1_RNA_ng + sample2_RNA_ng

#Input
name = input('Enter your name:')
print(name)

# Example 3: convert from floating point to integer
number = float(input('Please input a floating point number: '))
# Do an arithmetic calculation with the number
number_square = int(number) * int(number)

# Example using len()
h = "hello"
len_1 = len("Hello")
print(len_1)

#Example using upper() and lower()
h = "hello"
uc = h.upper()
print(uc)
lc = h.lower()
print(lc)

# Example of array/list assignment
myFirstList = [a, 12, 'altogether', 3.1]

# Printing list of values and its data type
numbers_list = [1, 2, 3, 4, 5]
print(numbers_list)
print("The type of", numbers_list, "is", type(numbers_list))
# Printing out the third value from the list
print('At index 2 in the list we have:', numbers_list[2])
At index 2 in the list we have: 3
# Printing slice 2:3
print("Slice 2:3 in list:", numbers_list[2:3])

# Printing the number of values in the list
print("There are", len(medical_terms), "values in the list")

# Adding one value at the of list
medical_terms.append("cancer")

# Adding one value at the specified index
medical_terms.insert(2, "cancer")

# Removing last value
medical_terms.pop()
# Removing one value at the specified index
medical_terms.pop(1)

# Sorting the list
medical_terms.sort()

# Remove all objects from the list
medical_terms.clear()

#If statement
IF A > 5 THEN
    PRINT "Too much”
ELSE IF A < 3 THEN
    PRINT "It is cheap"
ELSE
    PRINT "Moderate price"
END IF


if x1 >= x2 and x1 >= x3:
    print("Condition 1 is true")
    
#loops, 5 times.
A <- 5
WHILE A > 0
    PRINT A
    A <- A – 1
END WHILE

#loop 2, 5 times.
A <- 5
FOR i <- 1 TO 5
    PRINT A
END FOR

# Use of while loop
dna = "ATTTAC"
dna_length = len(dna)
i = 0
while i < dna_length:
    print("Current nucleotide:", dna[i])
    i = i + 1
 
#Creating dictionary with all key-value pairs at once. 
nn2aa = {'GAG':'Glu','AGA':'Arg'}
print(nn2aa) 
nn2aa.keys() #returns keys

# Example open file in read mode
fh = open('my_sequence.fa')

# Example read file
with open('my_sequence.fa', 'r') as fh:
# fcontent will be a string
    fcontent = fh.read()
    print(fcontent)

#Example read file
with open('my_sequence.fa') as fh:
    # Each line in file will be stored in line variable
    for line in fh:
        print(line)
       
 
# Example using rstript() to remove newline character
with open('my_sequence.fa') as fh:
    # Use rstrip() at end when using readline()
    line1 = fh.readline().rstrip('\n')
    line2 = fh.readline().rstrip('\n')
    line3 = fh.readline().rstrip('\n')

#Read all liens from text-file and store.
with open('my_sequence.fa') as fh:
# Read all file and store in lines
    lines = fh.readlines()
    for line in lines:
        print(line.rstrip('\n'))

#SPLIT WORDS INTO LETTERS (see "lst" array/list) (excludes spaces and includes other symbols)
string = 'geeksforgeeks'
lst = []
for letter in string:
	lst.append(letter)
print(lst)

#while loop
		beg_while2 = 0
		while beg_while2 < seq_list_length:
			print("Current nucleotide:", seq_list[beg_while2])
			beg_while2 = beg_while2 + 1
            

#write
with open('Results.txt', 'w+') as f:
    for items in gene_list:
        f.write('%s\n' %items)
        
#Split all including spaces
data_list_split = list(output)  

#Acquires all filenames in current folder
import os
arr = os.listdir()

#remove first item in list 
arr.pop(0)

#remove last item in list
arr.pop()


#Write new text to BEGINNING of text-file 
src=open("subtitles_raw/demo1_subtitles_TEST1.srt","r") 
fline="0\n00:00:00,000 --> 00:00:00,000\n\n\n" 
oline=src.readlines() 
oline.insert(0,fline) 
src.close()  
src=open("subtitles_raw/demo1_subtitles_TEST1.srt","w") 
src.writelines(oline) 
src.close()

#Write next text to END of text-file
file = open("subtitles_raw/demo1_subtitles_TEST1.srt", "a") 
content = "\n\n# This Content is added through the program #"
file.write(content)  
file.close()

#delete file via command prompt, in Python
os.system(f'del 3x_speed_Test_Results5.txt')

#copy files 
os.system(f'copy subtitles_raw/demo1_subtitles_TEST1.srt demo1_subtitles_TEST1.srt') 