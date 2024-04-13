#!/usr/bin/env py

from Bio import SeqIO

#All sequences from the fasta-file are stored in lists based on their name, length and sequence.
sequence_length_list = []
sequence_name_list = []
sequence_seq_list = []

gene_records = [] 

for seq_record in SeqIO.parse("gene_sequences.fasta", "fasta"): 
    
    len_seq = len(seq_record.seq)
    
    gene_records += [seq_record] 
   

for sequence in gene_records:
    len_seq = len(sequence.seq)
    sequence_name = sequence.name
    sequence_length = len_seq
    sequence_seq = sequence.seq
    sequence_length_list.append(sequence_length)
    sequence_name_list.append(sequence_name)
    sequence_seq_list.append(sequence_seq)
 
#The smallest gene sequence is identified.
smallest_sequence_item = sequence_length_list.index(min(sequence_length_list))


#BLAST is run on the smallest gene sequence and the alignment is indicated.
print("\nBLAST is running. Wait.\n")

from Bio.Blast import NCBIWWW
result_handle = NCBIWWW.qblast("blastn", "nt", sequence_seq_list[smallest_sequence_item])

with open("my_blast.xml", "w") as out_handle:
    out_handle.write(result_handle.read())
result_handle.close()

result_handle = open("my_blast.xml")


print("BLAST is now finished and you should see the file my_blast.xml in the folder.\n")