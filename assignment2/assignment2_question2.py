#!/usr/bin/env py

#If Q and E is present in the written sequence, then the sequence is printed on the screen.
seq = input('Write the sequence:\n')

seq_list = []
for letter in seq:
	seq_list.append(letter)

seq_list_length = len(seq)

new_seq_list = []
new_seq_list_Q = []
new_seq_list_E = []

beg_while1 = 0
beg_while2 = 0
beg_while3 = 0
while beg_while1 < seq_list_length:
    
    if seq_list[beg_while1] == 'Q':
        new_seq_list_Q.append(seq_list[beg_while1])
        
        while beg_while2 < seq_list_length:

            if seq_list[beg_while2] == 'E':
                new_seq_list_E.append(seq_list[beg_while2])
                while beg_while3 < seq_list_length:
                    if seq_list[beg_while3] == 'Q':
                        new_seq_list.append('Q')
                    if seq_list[beg_while3] == 'E':
                        new_seq_list.append('E')
                    if seq_list[beg_while3] == 'A':
                        new_seq_list.append('a')
                    if seq_list[beg_while3] == 'C':
                        new_seq_list.append('c')     
                    if seq_list[beg_while3] == 'D':
                        new_seq_list.append('d') 
                    if seq_list[beg_while3] == 'F':
                        new_seq_list.append('f') 
                    if seq_list[beg_while3] == 'G':
                        new_seq_list.append('g')  
                    if seq_list[beg_while3] == 'H':
                        new_seq_list.append('h')  
                    if seq_list[beg_while3] == 'I':
                        new_seq_list.append('i') 
                    if seq_list[beg_while3] == 'K':
                        new_seq_list.append('k') 
                    if seq_list[beg_while3] == 'L':
                        new_seq_list.append('l') 
                    if seq_list[beg_while3] == 'M':
                        new_seq_list.append('m') 
                    if seq_list[beg_while3] == 'N':
                        new_seq_list.append('n')  
                    if seq_list[beg_while3] == 'O':
                        new_seq_list.append('o') 
                    if seq_list[beg_while3] == 'P':
                        new_seq_list.append('p') 
                    if seq_list[beg_while3] == 'R':
                        new_seq_list.append('r')  
                    if seq_list[beg_while3] == 'S':
                        new_seq_list.append('s')
                    if seq_list[beg_while3] == 'T':
                        new_seq_list.append('t') 
                    if seq_list[beg_while3] == 'U':
                        new_seq_list.append('u')
                    if seq_list[beg_while3] == 'V':
                        new_seq_list.append('v')
                    if seq_list[beg_while3] == 'W':
                        new_seq_list.append('W')  
                    if seq_list[beg_while3] == 'Y':
                        new_seq_list.append('Y')     
                        
                    beg_while3 = beg_while3 + 1
                
            beg_while2 = beg_while2 + 1
            
    beg_while1 = beg_while1 + 1


new_seq_list_E_length = len(new_seq_list_E)
new_seq_list_Q_length = len(new_seq_list_Q)
if new_seq_list_E_length > 0 and new_seq_list_Q_length > 0:
    output = "".join(new_seq_list)
    print(output)
if new_seq_list_E_length < 1 and new_seq_list_Q_length < 1:
    print("Protein sequence does not contain any glutamine and glutamate amino acids")
    
#End of program

