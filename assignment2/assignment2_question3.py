#!/usr/bin/env py

#For the genes that are labeled as protein coding, they are stored in a dictionary and then written to a txt-file. 
data_list = []
protein_coding_list = []
gene_list = []
Dictionary = {}


with open('GeneType.txt','r') as f:
    for line in f:
        for word in line.split():
           data_list.append(word)


data_list_length = len(data_list)

beg_while2 = 3
beg_while2_next = 2
while beg_while2 < data_list_length:
    if data_list[beg_while2] == 'protein_coding':
        gene_list.append(data_list[beg_while2_next])
        protein_coding_list.append(data_list[beg_while2])
        Dictionary[data_list[beg_while2_next]]=data_list[beg_while2]
	
    beg_while2_next = beg_while2_next + 2
    beg_while2 = beg_while2 + 2

protein_coding_list_length = len(protein_coding_list)

print("There are", len(Dictionary), "genes annotated as protein coding. \n\nThe file Results.txt has been written in the folder.")

with open('Results.txt', 'w+') as f:
    for items in Dictionary:
        f.write('%s\n' %items)
     
