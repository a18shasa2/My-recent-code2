#!/usr/bin/env py

from Bio import SeqIO

#All sequences from the fasta-file are stored in lists based on their name, length and sequence.
sequence_length_list = []
sequence_name_list = []
sequence_seq_list = []

all_records = [] # list for storing SecRecords

# Iterate over all sequences in Fasta file and store in SeqRecords.
for seq_record in SeqIO.parse("gene_sequences.fasta", "fasta"): 
    
    len_seq = len(seq_record.seq) # Length of sequences
#    print("Seq:", seq_record.name, ", length:", len_seq)
    
    all_records += [seq_record] # Add each SeqRecord to list in each iteration.
   
#print(all_records[0])

#Iterate over all SeqRecords in list all_records.
for sequence in all_records:
    len_seq = len(sequence.seq)
    #print("Seq:", sequence.name, ", length:", len_seq)
    sequence_name = sequence.name
    sequence_length = len_seq
    sequence_seq = sequence.seq
    sequence_length_list.append(sequence_length)
    sequence_name_list.append(sequence_name)
    sequence_seq_list.append(sequence_seq)
 
#The smallest gene sequence is identified.
smallest_sequence_item = sequence_length_list.index(min(sequence_length_list))

#print(smallest_sequence_item)

#print(sequence_name_list[smallest_sequence_item], sequence_length_list[smallest_sequence_item], sequence_seq_list[smallest_sequence_item])

#print(all_records[smallest_sequence_item])

#BLAST is run on the smallest gene sequence and the alignment is indicated.
#from Bio.Blast import NCBIWWW
#result_handle = NCBIWWW.qblast("blastn", "nt", sequence_seq_list[smallest_sequence_item])
#print(result_handle)

print("\nBLAST is running. Wait.\n")

from Bio.Blast import NCBIWWW
result_handle = NCBIWWW.qblast("blastn", "nt", sequence_seq_list[smallest_sequence_item])

with open("my_blast.xml", "w") as out_handle:
    out_handle.write(result_handle.read())
result_handle.close()

result_handle = open("my_blast.xml")

#print(result_handle)

print("\nBLAST is now finished and you should see the file my_blast.xml in the folder.\n")