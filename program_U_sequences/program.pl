#!/usr/bin/perl

#In unix write "cd (pathway to the program-folder by dragging to folder to unix)" without quotation marks and press enter.
#In unix write "perl XXXX.pl" without quotation marks and press enter.

#PART 1: The known genome sequence is retrieved from the fasta-file. 
open(TEXTFILE1, "<fastaname_known.fasta");
$nr_of_lines1 = 0;
while (<TEXTFILE1>) { 
	$nr_of_lines1++;
}
close TEXTFILE1;

open(TEXTFILE, "<fastaname_known.fasta");
$add1=0;
while ($add1 < $nr_of_lines1){
	$line = <TEXTFILE>;
	push(@array1, $line);
	$add1++;
	}
	
shift(@array1); #This line removes the accession number from the FASTA-file. 
@array1_join=join("", @array1);
@array1_join_split=split("", $array1_join[0]);
$array1_join_split_total = scalar @array1_join_split;
$total1=0;
while ($total1 < $array1_join_split_total){
	if ($array1_join_split[$total1] eq "A" || $array1_join_split[$total1] eq "B" || $array1_join_split[$total1] eq "C" || $array1_join_split[$total1] eq "D" || $array1_join_split[$total1] eq "E" || $array1_join_split[$total1] eq "F" || $array1_join_split[$total1] eq "G" || $array1_join_split[$total1] eq "H" || $array1_join_split[$total1] eq "I" || $array1_join_split[$total1] eq "J" || $array1_join_split[$total1] eq "K" || $array1_join_split[$total1] eq "L" || $array1_join_split[$total1] eq "M" || $array1_join_split[$total1] eq "N" || $array1_join_split[$total1] eq "O" || $array1_join_split[$total1] eq "P" || $array1_join_split[$total1] eq "Q" || $array1_join_split[$total1] eq "R" || $array1_join_split[$total1] eq "S" || $array1_join_split[$total1] eq "T" || $array1_join_split[$total1] eq "U" || $array1_join_split[$total1] eq "V" || $array1_join_split[$total1] eq "W" || $array1_join_split[$total1] eq "X" || $array1_join_split[$total1] eq "Y" || $array1_join_split[$total1] eq "Z"){
	push(@array1_join_split_noblank, $array1_join_split[$total1]);
    }
	$total1++;
	}
@array1_join_split_noblanks_rejoin=join("", @array1_join_split_noblank);
$seq1_known=$array1_join_split_noblanks_rejoin[0];
$seq1_length=length($seq1_known);

#PART 2: The unknown sequence is retrieved from the fasta-file. 
open(TEXTFILE2, "<fastaname_unknown.fasta");
$nr_of_lines2 = 0;
while (<TEXTFILE2>) { 
	$nr_of_lines2++;
}
close TEXTFILE2;

open(TEXTFILE3, "<fastaname_unknown.fasta");
$add2=0;
while ($add2 < $nr_of_lines2){
	$line = <TEXTFILE3>;
	push(@array2, $line);
	$add2++;
	}
	
shift(@array2); #This line removes the accession number from the FASTA-file. 
@array2_join=join("", @array2);
@array2_join_split=split("", $array2_join[0]);
$array2_join_split_total = scalar @array2_join_split;
$total2=0;
while ($total2 < $array2_join_split_total){
	if ($array2_join_split[$total2] eq "A" || $array2_join_split[$total2] eq "B" || $array2_join_split[$total2] eq "C" || $array2_join_split[$total2] eq "D" || $array2_join_split[$total2] eq "E" || $array2_join_split[$total2] eq "F" || $array2_join_split[$total2] eq "G" || $array2_join_split[$total2] eq "H" || $array2_join_split[$total2] eq "I" || $array2_join_split[$total2] eq "J" || $array2_join_split[$total2] eq "K" || $array2_join_split[$total2] eq "L" || $array2_join_split[$total2] eq "M" || $array2_join_split[$total2] eq "N" || $array2_join_split[$total2] eq "O" || $array2_join_split[$total2] eq "P" || $array2_join_split[$total2] eq "Q" || $array2_join_split[$total2] eq "R" || $array2_join_split[$total2] eq "S" || $array2_join_split[$total2] eq "T" || $array2_join_split[$total2] eq "U" || $array2_join_split[$total2] eq "V" || $array2_join_split[$total2] eq "W" || $array2_join_split[$total2] eq "X" || $array2_join_split[$total2] eq "Y" || $array2_join_split[$total2] eq "Z"){
	push(@array2_join_split_noblank, $array2_join_split[$total2]);
    }
	$total2++;
	}
@array2_join_split_noblanks_rejoin=join("", @array2_join_split_noblank);
$seq2_known=$array2_join_split_noblanks_rejoin[0];
$seq2_length=length($seq2_known);

#PART 3: The unknown sequence and known sequence are compared with each other. 
print "\nThe homologous sequences are the following in red in the genome:\n";
#PART #3a: Individual homologous sequences are extracted and their locations in the genome are highlighted.  	
$total_comp2=0;
$total_comp3=1;
$array_comp_total = scalar @array1_join_split_noblank;
while ($total_comp2 < $array_comp_total){
	if ($array1_join_split_noblank[$total_comp2] eq $array2_join_split_noblank[$total_comp2]){
	  use Term::ANSIColor;
      $ENV{ANSI_COLORS_DISABLED}++ unless -t STDOUT;
      print colored("$array1_join_split_noblank[$total_comp2]","red");
	  push(@array_comp_check, $total_comp3);
	  
	  push(@array_comp_homologous_structures_separate, $array1_join_split_noblank[$total_comp2]);
	  
    }
	
	if ($array1_join_split_noblank[$total_comp2] ne $array2_join_split_noblank[$total_comp2]){
	   if ($array1_join_split_noblank[$total_comp2_previous] eq $array2_join_split_noblank[$total_comp2_previous]){
	     print "\nBase number in genome: $array_comp_check[0] - $total_comp2 \n\n";
		 
		 @array_comp_homologous_structures_separate_join=join("", @array_comp_homologous_structures_separate);
		 push(@array_comp_homologous_structures_individual, $array_comp_homologous_structures_separate_join[0]);
	   } 
	   undef @array_comp_check;
	   undef @array_comp_homologous_structures_separate;
	   undef @array_comp_homologous_structures_separate_join;
    }
	
	$total_comp2++;
    $total_comp3++;
	$total_comp2_previous=$total_comp2-1;
	}	
#PART 3b: Entire genome is marked. 
print "The entire genome sequence is marked with homologous sequences:\n";
$total_comp=0;
$array_comp_total = scalar @array1_join_split_noblank;
while ($total_comp < $array_comp_total){
	if ($array1_join_split_noblank[$total_comp] eq $array2_join_split_noblank[$total_comp]){
	  use Term::ANSIColor;
      $ENV{ANSI_COLORS_DISABLED}++ unless -t STDOUT;
      print colored("$array1_join_split_noblank[$total_comp]","red");
	  
    }
	
	if ($array1_join_split_noblank[$total_comp] ne $array2_join_split_noblank[$total_comp]){
       print "$array1_join_split_noblank[$total_comp]";
    }
	
	$total_comp++;
	}
	
#PART 4: Identifying introns in homologous sequences. Introns = the sequence-part with GU-AG or AU-AC.
print "\n---------------------------------------------\nThe introns are marked in blue in the homologous sequences.\n\n";
$array_comp_homologous_structures_individual_ref = scalar @array_comp_homologous_structures_individual;
$total_homolog_individual_total=0;

while ($total_homolog_individual_total < $array_comp_homologous_structures_individual_ref){
	$total_homolog_individual_total_plus_one=$total_homolog_individual_total+1;
	print "Original homologous sequence $total_homolog_individual_total_plus_one:\n";
	@array_comp_homologous_structures_individual_ref_split=split("", $array_comp_homologous_structures_individual[$total_homolog_individual_total]);
	$array_comp_homologous_structures_individual_ref_split_count = scalar @array_comp_homologous_structures_individual_ref_split;
	
	$total_homolog_individual_total1=0;
	while ($total_homolog_individual_total1 < $array_comp_homologous_structures_individual_ref_split_count){
        $total_homolog_individual_total2=$total_homolog_individual_total1+1;
		$total_homolog_individual_total3=$total_homolog_individual_total1+2;
		$total_homolog_individual_total4=$total_homolog_individual_total1+3;
		
		if ($array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total1] eq "A" && $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total2] eq "U" && $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total3] eq "C" && $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total4] eq "G"){
		    use Term::ANSIColor;
			$ENV{ANSI_COLORS_DISABLED}++ unless -t STDOUT;
			print colored("$array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total1]","blue");
			print colored("$array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total2]","blue");
			print colored("$array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total3]","blue");
			print colored("$array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total4]","blue");
			
			push(@introns_array, $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total1]);
			push(@introns_array, $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total2]);
			push(@introns_array, $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total3]);
			push(@introns_array, $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total4]);
	  
			$total_homolog_individual_total1++;
			$total_homolog_individual_total1++;
			$total_homolog_individual_total1++;
			$total_homolog_individual_total1++;
	  
        }
		else{
			print "$array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total1]";
			push(@exons_array, $array_comp_homologous_structures_individual_ref_split[$total_homolog_individual_total1]);
			$total_homolog_individual_total1++;
        }
	
	
    }

    @introns_array_join=join("", @introns_array);
    if ($introns_array_join[0] ne ""){
	   print "\nIntrons in homologous sequence $total_homolog_individual_total_plus_one:\n"; 
	   print colored("@introns_array_join","blue");
    }
	
	@exons_array_join=join("", @exons_array);
	if ($exons_array_join[0] ne ""){
	print "\nExons in homologous sequence $total_homolog_individual_total_plus_one:\n@exons_array_join"; 
	}
	
    undef @introns_array_join; 
	undef @exons_array_join; 
    undef @introns_array; 
	undef @exons_array; 
	undef @array_comp_homologous_structures_individual_ref_split; 
	$total_homolog_individual_total++;
	print "\n\n";
	}
	
#PART 5: Generating section of genome sequence from table.
print "---------------------------------------------\nThe coordinates from the table are below.\n\n";
open(TEXTFILE4, "<table.txt");
$nr_of_lines3 = 0;
while (<TEXTFILE4>) { 
	$nr_of_lines3++;
}
close TEXTFILE4;

open(TEXTFILE5, "<table.txt");
$add3=0;
while ($add3 < $nr_of_lines3){
	$line = <TEXTFILE5>;
	push(@array3, $line);
	@array3_split=split(" ", $array3[$add3]);
	push(@chrom_coordinates, $array3_split[0]);
	push(@chrom_coordinates, $array3_split[1]);
	push(@chrom_coordinates, $array3_split[2]);
	undef @array3_split;
	$add3++;
	}

$chrom_coordinates_total = scalar @chrom_coordinates;
$chrom_coordinates_count = 0;

  while ($chrom_coordinates_count < $chrom_coordinates_total){
    $chrom_coordinates_count_beg = $chrom_coordinates_count + 1;
    $chrom_coordinates_count_end = $chrom_coordinates_count + 2;
	
	print "$chrom_coordinates[$chrom_coordinates_count] $chrom_coordinates[$chrom_coordinates_count_beg] $chrom_coordinates[$chrom_coordinates_count_end]:\n";
	
	$chrom_coordinates_count_beg_loop = $chrom_coordinates[$chrom_coordinates_count_beg]-1;
	$chrom_coordinates_count_end_loop = $chrom_coordinates[$chrom_coordinates_count_end];
		while ($chrom_coordinates_count_beg_loop < $chrom_coordinates_count_end_loop){	
		   print "$array1_join_split_noblank[$chrom_coordinates_count_beg_loop]";
		   $chrom_coordinates_count_beg_loop++;
		  }
		  
	print "\n\n";
	$chrom_coordinates_count++;
	$chrom_coordinates_count++;
	$chrom_coordinates_count++;
	}



	

