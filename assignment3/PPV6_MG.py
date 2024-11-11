#!/usr/bin/env py

#Input: Folders "input" and "genome". Output: Folder "output_folders".
#Prerequisities: "Java Runtime Environment (JRE)", "Strawberry Perl", "Python 3.8" (or higher).
#Tools: Quality control using "FastQC" or "MultiQC". Trimming using "Trimmomatic". Sequence alignment using "BWA" or "HISAT2" (FASTQ to SAM). Then use "Samtools" (SAM to BAM, BAM to BCF). Variant calling using "BCFtools" (BCF to VCF). Variant annotation using "annovar" or "vep" (VCF unannotated -> VCF annotated).   
#On Windows, run the program using cmd or Cygwin.  

import os
import subprocess
import shutil
import importlib.util

package_name = 'pandas'
if importlib.util.find_spec(package_name) is None:        
    os.system('py -m pip install pandas')         
package_name = 'numpy'
if importlib.util.find_spec(package_name) is None:        
    os.system('py -m pip install numpy')

import re
import pandas as pd
import numpy as np

#Part 0a: Load the settings. 
with open('settings_config/settings_config.txt', 'r') as file:
    settings_loaded = file.readlines()
    
fastqc_config_settings = settings_loaded[0].split()
fastqc_checker = fastqc_config_settings[2]

multiqc_config_settings = settings_loaded[1].split()
multiqc_checker = multiqc_config_settings[2]

trimmomatic_config_settings = settings_loaded[2].split()
trimmomatic_checker = trimmomatic_config_settings[2]

trimmomaticfa_config_settings = settings_loaded[3].split()
trimmomaticfa_checker = trimmomaticfa_config_settings[2]

hisat2_config_settings = settings_loaded[4].split()
hisat2_checker = hisat2_config_settings[2]

annovar_config_settings = settings_loaded[5].split()
annovar_checker = annovar_config_settings[2]

VCF123_config_settings = settings_loaded[6].split()
VCF123_checker = VCF123_config_settings[2]

snpeff_snpsift_config_settings = settings_loaded[7].split()
snpeff_snpsift_checker = snpeff_snpsift_config_settings[2]

custom_filtration_config_settings = settings_loaded[8].split()
custom_filtration_checker = custom_filtration_config_settings[2]


#Part 0b: Indicate the input.
inputvar = os.listdir('input')
inputvar_zero = 0
inputvar_length = len(inputvar)

genome_list = os.listdir('genome')
genome_list_split = list(genome_list[0])    
genome_list_split_joined = "".join(genome_list_split) 

while inputvar_zero < inputvar_length:
    #Name is generated.
    name_list_split = list(inputvar[inputvar_zero])    
    name_list_split.pop()
    name_list_split.pop()
    name_list_split.pop()
    name_list_split.pop()
    name_list_split.pop()    
    name_list_split.pop() 
    name_list_split_joined = "".join(name_list_split)  
    #name_list_split_joined_previous = name_list_split_joined    

    #PART1: Generate quality report with FastQC.
    current_directory = os.getcwd()
    current_directory_forward = current_directory.replace('\\', '/')     
    new_directory = current_directory + '/tools/FastQC'
    os.chdir(new_directory)    

    samtools_path = current_directory + '/tools/bin/samtools.exe'
    samtools_path_forward = samtools_path.replace('\\', '/')       
    hisat_s_build_path = current_directory + '/tools/bin/hisat2-build-s.exe'
    hisat_s_build_path_forward = hisat_s_build_path.replace('\\', '/')      
    hisat_s_align_path = current_directory + '/tools/bin/hisat2-align-s.exe'
    hisat_s_align_path_forward = hisat_s_align_path.replace('\\', '/')     
    bcftools_path = current_directory + '/tools/bin/bcftools.exe'
    bcftools_path_forward = bcftools_path.replace('\\', '/')       
    JRE_path = current_directory + '/tools/JRE/bin/java.exe'
    JRE_path_forward = JRE_path.replace('\\', '/')
    perl_path = current_directory + '/tools/bin/perl.exe'
    perl_path_forward = samtools_path.replace('\\', '/')     

    fastqc_checker = "active"  
    fastqc_checker = fastqc_config_settings[2]    
    if fastqc_checker == "active":     
        print("\n The quality report is generating using FastQC. Wait. \n")
        os.system(f'{JRE_path_forward} -Xmx250m -classpath .;./sam-1.103.jar;./jbzip2-0.9.jar uk.ac.babraham.FastQC.FastQCApplication ../../input/{inputvar[inputvar_zero]}')
        #os.system(f'run_fastqc.bat ../../input/{inputvar[inputvar_zero]}')
        #os.system(f'java -Xmx250m -classpath .;./sam-1.103.jar;./jbzip2-0.9.jar uk.ac.babraham.FastQC.FastQCApplication ../../input/{inputvar[inputvar_zero]}')

        from_folder_directory = "../../input/" + name_list_split_joined + "_fastqc.html" 
        to_folder_directory = "../../output/" + name_list_split_joined + "_fastqc.html" 
        shutil.move(from_folder_directory, to_folder_directory)
        from_folder_directory = "../../input/" + name_list_split_joined + "_fastqc.zip" 
        to_folder_directory = "../../output/" + name_list_split_joined + "_fastqc.zip" 
        shutil.move(from_folder_directory, to_folder_directory)
    
    #ALTERNATIVE: MultiQC  
    multiqc_checker = "inactive"    
    if multiqc_checker == "active": 
        print("\n The quality report is generating using MultiQC. Wait. \n")  
        package_name = 'multiqc'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install multiqc') #MultiQC is downloaded and installed automatically. Requires Python 3.8 or higher. Note: Instead of "py", can use "python".
        import multiqc
        current_directory = os.getcwd()
        output_path = current_directory + "/output"
        os.chdir(output_path)        
        multiqc.run(output_path)  
        os.chdir(current_directory) 
        #os.system(f'multiqc output -n test1_multiqc_report_final.html -o output') #Reports are now generated based on the fastqc-files in the directory "input".      

    paus_one = input('\n The program has been paused. Press enter to continue. \n')

    #PART2: Adapter sequence is trimmed with Trimmomatic.  
    #Note: If there is nothing to trim, then no report will be generated.     
    os.chdir(current_directory)     
    print("\n The adapter sequence is trimmed using Trimmomatic. Wait. \n")    
    os.system(f'{JRE_path_forward} -jar tools/trimmomatic-0.36.jar SE input/{inputvar[inputvar_zero]} output/{name_list_split_joined}_trimmed.fastq ILLUMINACLIP:adapter_trimmomatic/adapter_seq.{trimmomaticfa_checker}')  
    #os.system(f'java -jar tools/trimmomatic-0.36.jar SE input/{inputvar[inputvar_zero]} output/{name_list_split_joined}_trimmed.fastq ILLUMINACLIP:adapter_trimmomatic/adapter_seq.fa:0:30:10')    
    #os.system(f'run_trimmomatic.bat SE ../input/{inputvar[inputvar_zero]} ../output/{name_list_split_joined}_trimmed.fastq ILLUMINACLIP:../genome/adapter_seq.fa')
    #os.system(f'java -jar trimmomatic-0.36.jar SE KLO_forward.fastq trimmed_fastq/out1.fastq ILLUMINACLIP:adapter_seq.fa:0:20:12 HEADCROP:10 SLIDINGWINDOW:4:20 MINLEN:30')
   
    #PART3: Generate the trimmed quality report with FastQC.  
    os.chdir(new_directory)     
    print("\n The trimmed quality report is generating using FastQC. Wait. \n")
    os.system(f'{JRE_path_forward} -Xmx250m -classpath .;./sam-1.103.jar;./jbzip2-0.9.jar uk.ac.babraham.FastQC.FastQCApplication ../../output/{name_list_split_joined}_trimmed.fastq')
    #os.system(f'run_fastqc.bat ../../output/{name_list_split_joined}_trimmed.fastq')
    #os.system(f'java -Xmx250m -classpath .;./sam-1.103.jar;./jbzip2-0.9.jar uk.ac.babraham.FastQC.FastQCApplication ../../output/{name_list_split_joined}_trimmed.fastq')

    #trim_ask = "yes"  
    trimmomatic_folder_files = os.listdir('../../output')
    trimmomatic_file_name = name_list_split_joined + "_trimmed.fastq"
    if trimmomatic_file_name in trimmomatic_folder_files:
    #trim_ask = input('\n Does the original fastq-file pass the quality control? (Yes/No) \n')   
    #if trim_ask == "No" or trim_ask == "no" or trim_ask == "N" or trim_ask == "n" or trim_ask == "nej":   
        inputvar[inputvar_zero] = name_list_split_joined + "_trimmed.fastq"
        name_list_split_joined = name_list_split_joined + "_trimmed"
        from_folder_directory = "../../output/" + inputvar[inputvar_zero] 
        to_folder_directory = "../../input/" + inputvar[inputvar_zero] 
        shutil.copyfile(from_folder_directory, to_folder_directory)          

    paus_two = input('\n The program has been paused. Press enter to continue. \n')

    #PART4: Sequence alignment with reference-based assembly is performed with BWA or HISAT2. This is followed by Samtools.
    #Note: Sequence alignment is below performed on the original fastq-file (not the trimmed one).  
    #index_checker = input('\n Has the genome-file been indexed? (Yes/No) \n')
    
    bwa_checker = "inactive"    
    if bwa_checker == "active":     
        print("\n Sequence alignment with reference-based assembly with BWA and samtools are run. Wait. \n")    
        os.chdir(current_directory)
        new_directory_two = current_directory + '/tools'
        os.chdir(new_directory_two)     
        #BWA is run. (fastq -> SAM)  
        genome_index_directory = current_directory + "/genome_index"
        genome_index_directory_forward = genome_index_directory.replace('\\', '/')
        #if index_checker == "No" or index_checker == "no" or index_checker == "N" or index_checker == "n" or index_checker == "nej": 
        if os.listdir(genome_index_directory_forward) == []: 
            os.system(f'bwa.exe index ../genome/{genome_list_split_joined}')    
        os.system(f'bwa.exe aln ../genome/{genome_list_split_joined} ../input/{inputvar[inputvar_zero]} > ../output/{name_list_split_joined}.aln.sai')
        os.system(f'bwa.exe sampe ../genome/{genome_list_split_joined} ../output/{name_list_split_joined}.aln.sai ../input/{inputvar[inputvar_zero]} > ../output/{name_list_split_joined}.aln.sam')    
        #PAIR END VER: os.system(f'bwa.exe sampe ../genome/{genome_list_split_joined} ../output/{name_list_split_joined}_1.aln.sai ../output/{name_list_split_joined}_2.aln.sai ../input/{inputvar[inputvar_zero]}_1 ../input/{inputvar[inputvar_zero]}_2.fastq.gz > ../output/{name_list_split_joined}.aln.sam')      
        
        #Samtools is run. (SAM -> BAM, BAM -> BCF)
        os.chdir(current_directory)    
        os.system(f'{samtools_path} faidx genome/{genome_list_split_joined}')
        os.system(f'{samtools_path} import genome/{genome_list_split_joined}.fai output/{name_list_split_joined}.aln.sam output/{name_list_split_joined}.aln.bam') 
        os.system(f'{samtools_path} sort output/{name_list_split_joined}.aln.bam output/{name_list_split_joined}.aln.sorted') 
        os.system(f'{samtools_path} index output/{name_list_split_joined}.aln.sorted.bam')    
        os.system(f'{samtools_path_forward} mpileup -u –f genome/{genome_list_split_joined} output/{name_list_split_joined}.aln.sorted.bam > output/{name_list_split_joined}_pilefile.bcf')  


        if index_checker == "No" or index_checker == "no" or index_checker == "N" or index_checker == "n" or index_checker == "nej":
            from_folder_directory = "../genome/" + genome_list_split_joined + ".amb" 
            to_folder_directory = "../output/" + genome_list_split_joined + ".amb" 
            shutil.move(from_folder_directory, to_folder_directory)    
            from_folder_directory = "../genome/" + genome_list_split_joined + ".ann" 
            to_folder_directory = "../output/" + genome_list_split_joined + ".ann" 
            shutil.move(from_folder_directory, to_folder_directory)   
            from_folder_directory = "../genome/" + genome_list_split_joined + ".bwt" 
            to_folder_directory = "../output/" + genome_list_split_joined + ".bwt" 
            shutil.move(from_folder_directory, to_folder_directory) 
            from_folder_directory = "../genome/" + genome_list_split_joined + ".pac" 
            to_folder_directory = "../output/" + genome_list_split_joined + ".pac" 
            shutil.move(from_folder_directory, to_folder_directory) 
            from_folder_directory = "../genome/" + genome_list_split_joined + ".sa" 
            to_folder_directory = "../output/" + genome_list_split_joined + ".sa" 
            shutil.move(from_folder_directory, to_folder_directory)  
    
    
    #ALTERNATIVE: HISAT2 (fastq -> SAM). SAMTOOLS (SAM -> BCF)
    hisat_checker = "active"   
    hisat_checker = hisat2_config_settings[2]    
    if hisat_checker == "active":    
        print("\n Sequence alignment with reference-based assembly using HISAT2 is run. Wait. \n")      
        os.chdir(current_directory) 
        genome_index_directory = current_directory + "/genome_index"
        genome_index_directory_forward = genome_index_directory.replace('\\', '/')
        #if index_checker == "No" or index_checker == "no" or index_checker == "N" or index_checker == "n" or index_checker == "nej": 
        if os.listdir(genome_index_directory_forward) == []:        
            os.system(f'{hisat_s_build_path} genome/{genome_list_split_joined} genome_index/{genome_list_split_joined}')
        
        #Checks name of the index-file.
        genome_index_list = os.listdir('genome_index')
        genome_index_list_split = list(genome_index_list[0])   
        genome_index_list_split.pop()
        genome_index_list_split.pop()
        genome_index_list_split.pop()	
        genome_index_list_split.pop()
        genome_index_list_split.pop() 
        genome_index_list_split.pop()         
        genome_index_list_split_joined = "".join(genome_index_list_split) 
        
        os.system(f'{hisat_s_align_path} -x genome_index/{genome_index_list_split_joined} -U input/{inputvar[inputvar_zero]} -S output/{name_list_split_joined}.sam')
        os.system(f'{samtools_path} faidx genome/{genome_list_split_joined}')
        os.system(f'{samtools_path} import genome/{genome_list_split_joined}.fai output/{name_list_split_joined}.sam output/{name_list_split_joined}.bam') 
        os.system(f'{samtools_path} flagstat output/{name_list_split_joined}.bam')
        os.system(f'{samtools_path} sort output/{name_list_split_joined}.bam output/{name_list_split_joined}_sorted') 
        os.system(f'{samtools_path} index output/{name_list_split_joined}_sorted.bam') 
        os.system(f'{samtools_path_forward} mpileup -u -f genome/{genome_list_split_joined} output/{name_list_split_joined}_sorted.bam > output/{name_list_split_joined}_pilefile.bcf')
        #COMMAND to extract mapped reads to a certain region on the genome and place these reads on a new bam file (part1): os.system(f'{samtools_path_forward} view -b output/{name_list_split_joined}.bam chrX:11906467-11911091 > output/regucalcin.bam')
        #COMMAND to extract mapped reads to a certain region on the genome and place these reads on a new bam file (part2): os.system(f'{samtools_path_forward} index output/regucalcin.bam') 

    from_folder_directory = "genome/" + genome_list_split_joined + ".fai" 
    to_folder_directory = "output/" + genome_list_split_joined + ".fai" 
    shutil.move(from_folder_directory, to_folder_directory)
         
    #PART5: Variant calling with bcftools (BCF -> VCF).
    print("\n Variant calling with bcftools is run. Wait. \n")    
    os.system(f'{bcftools_path_forward} view -G output/{name_list_split_joined}_pilefile.bcf > output/{name_list_split_joined}_concensus.vcf')
    #FOR ANNOVAR COMMAND: os.system(f'{bcftools_path_forward} view -G output/{name_list_split_joined}_pilefile.bcf > output/{name_list_split_joined}_concensus.vcf')
    #os.system(f'{bcftools_path_forward} view -c output/{name_list_split_joined}_pilefile.bcf > output/{name_list_split_joined}_concensus.vcf')
    #Requires Perl to be installed: os.system(f'perl tools/vcfutils.pl vcf2fq output/{name_list_split_joined}_consensus.vcf > output/{name_list_split_joined}_consensus.fasta')     

    #PART6: Variant annotation is performed (unannotated VCF -> annotated VCF).
    #Annovar is run.   
    annovar_checker = "inactive"   
    annovar_checker = annovar_config_settings[2]    
    if annovar_checker == "active":   
        annovar_path = current_directory + '/tools/annovar'  
        os.chdir(annovar_path)         
        print("\n Variant annotation is run with Annovar. Wait. \n")      
        os.system(f'perl table_annovar.pl ../../output/{name_list_split_joined}_concensus.vcf humandb/ -buildver hg19 -out ../../output/{name_list_split_joined}_annovar --thread 4 -remove -protocol refGene -operation g -nastring . -vcfinput -polish')    
        #os.system(f'{perl_path_forward} tools/annovar/table_annovar.pl output/{name_list_split_joined}_concensus.vcf tools/annovar/humandb/ -buildver hg19 -out output/{name_list_split_joined}_annovar --thread 4 -remove -protocol refGene -operation g -nastring . -vcfinput -polish')    
        #TEST COMMAND: os.system(f'perl tools/annovar/table_annovar.pl tools/annovar/example/ex2.vcf tools/annovar/humandb/ -buildver hg19 -out output/test2_VCF --thread 4 -remove -protocol refGene -operation g -nastring . -vcfinput -polish')
        os.chdir(current_directory) 

  
    #Vep is run
    vep_checker = "inactive"    
    if vep_checker == "active":     
        print("\n Variant annotation is run with Vep. Wait. \n")
        vep_checker = input('\n Has Vep been installed? (Yes/No) \n')
        if index_checker == "No" or index_checker == "no" or index_checker == "N" or index_checker == "n" or index_checker == "nej":
            os.system(f'perl tools/vep_release_112/INSTALL.pl --NO_HTSLIB --NO_TEST')        
        os.system(f'./vep -i output/{name_list_split_joined}_concensus.vcf --cache --force_overwrite')


    #SnpEff/SnpSift is run.
    #Note: Place "vcf.gz" and "tbi" and "md5" in the same folder, for each dbsnp-collection. Generates rs-ids during annotation. Retrieve collection from here: https://ftp.ncbi.nih.gov/snp/organisms/human_9606/VCF/
    snpeff_checker = "active" 
    snpeff_checker = snpeff_snpsift_config_settings[2]    
    if snpeff_checker == "active": 
        dbsnp_folder_files = os.listdir('dbsnp')
        snpeff_path = current_directory_forward + '/tools/snpEff_snpSift'  
        os.chdir(snpeff_path)  
        print("\n SnpSift is running. Wait. \n")
        #os.system(f'{JRE_path_forward} -jar SnpSift.jar annotate -id ../../dbsnp/00-common_all.vcf.gz ../../output/test.chr22.vcf > ../../output/TEST_annotated03.vcf')
        #print("This is:", dbsnp_folder_files[0])
        #Note: Solve error message by removing "X" in VCF-file. 
        vcf_file_name_path = "../../output/" + name_list_split_joined + "_concensus.vcf"
        with open(vcf_file_name_path, 'r') as file:
          filedata = file.read()
        filedata = filedata.replace('X', '.')
        filedata = filedata.replace('chr.', 'chrX')        
        with open(vcf_file_name_path, 'w') as file:
          file.write(filedata)  
        os.system(f'{JRE_path_forward} -jar snpEff.jar -v GRCh37.75 ../../output/{name_list_split_joined}_concensus.vcf > ../../output/{name_list_split_joined}_annotated_snpEFF.vcf')  #Annotations are written.            
        #os.system(f'{JRE_path_forward} -jar SnpSift.jar rmInfo ../../output/{name_list_split_joined}_concensus2.vcf DP > ./../output/{name_list_split_joined}_concensus2_removedannotation.vcf') #Removing annotation-command.    
        #os.system(f'{JRE_path_forward} -jar SnpSift.jar annotate -id ../../dbsnp/{dbsnp_folder_files[0]} ../../output/test.chr22.vcf > ../../output/{name_list_split_joined}_annotated_snpSift.vcf')     
        os.system(f'{JRE_path_forward} -jar SnpSift.jar annotate -id ../../dbsnp/{dbsnp_folder_files[0]} ../../output/{name_list_split_joined}_annotated_snpEFF.vcf > ../../output/{name_list_split_joined}_annotated_snpSift.vcf')  #Add rs-ID command.   
        os.chdir(current_directory)


    #PART7: Variant filtration.
    #VCF123 is run.    
    VCF123_checker = "inactive"   
    VCF123_checker = VCF123_config_settings[2]    
    if VCF123_checker == "active":   
        VCF123_path = current_directory_forward + '/tools/123VCF'  
        os.chdir(VCF123_path)         
        print("\n Variant filtration is run with 123VCF. Wait. \n")      
        os.system(f'{JRE_path_forward} -jar 123VCF.jar -cli -I {current_directory_forward}/output/{name_list_split_joined}_annovar.hg19_multianno.vcf -O {current_directory_forward}/output/{name_list_split_joined}_annovar_FILTERED.hg19_multianno.vcf -F {VCF123_path}/FilterTemplates/FilterSettings.txt')    
        os.chdir(current_directory) 
        
    #Custom code is run.    
    custom_filtration_checker = "active"     
    custom_filtration_checker = custom_filtration_config_settings[2]      
    if custom_filtration_checker == "active":  

        #PART 1: import CLINVAR ARCHIVE
        clinvar_archive_file = os.listdir('clinvar_pathogen_archive')

        clinvar_file_name = 'clinvar_pathogen_archive/' + clinvar_archive_file[1]

        ms_data = pd.read_csv(clinvar_file_name, sep = '\t')

        #PART 2: import ANNOTATED VCF file
        #input_file_location = os.listdir('input')

        input_file_directory = 'output/' + name_list_split_joined + "_annotated_snpSift.vcf"
        #print("THIS IS INPUT", input_file_directory)

        with open(input_file_directory, 'r') as file:
            lines = file.readlines()


        lines_length = len(lines)

        words_id_array = []
        words_base_beg_patient_array = []
        words_base_end_patient_array = []
        lines_array = []

        lines_zero = 0
        lines_length = len(lines)

        while lines_zero < lines_length:
            test_var = lines[lines_zero]
            if re.search(r'[#]', test_var):
                nothing_var = "nothing"
            else:
                words = test_var.split()
                #print("This is SSS:",words)
                words_id = words[2]
                words_id_array.append(words_id)
                words_base_beg_patient = words[3]
                words_base_beg_patient_array.append(words_base_beg_patient)    
                words_base_end_patient = words[4]
                words_base_end_patient_array.append(words_base_end_patient) 
                lines_array.append(lines[lines_zero])
            lines_zero = lines_zero + 1



        #PART 3: COMPARE. Note: Number needs to be stored in variable first. 
        ms_data_VariationID_list = ms_data['dbSNP_ID'].tolist()

        ms_data_Name_list = ms_data['Name'].tolist()

        info_replaced_array = []
        info_replaced_NONPATHOGEN_array = []
        info_replaced_NOMATCH_array = []

        lines_zero = 0
        lines_length = len(words_id_array)

        while lines_zero < lines_length:
            if words_id_array[lines_zero] in ms_data_VariationID_list:
                word_id_single = words_id_array[lines_zero] 
                indexfff = ms_data_VariationID_list.index(word_id_single)
                lines_list = ms_data_Name_list[indexfff].split()
                lines_list_semicolon = lines_list[0].split(":")
                lines_output_list_semicolon_len = len(lines_list_semicolon[1])
                lines_second_letter_archive = lines_output_list_semicolon_len - 1
                lines_first_letter_archive = lines_output_list_semicolon_len - 3
                lines_list_semicolon_extract = list(lines_list_semicolon[1])

                #print(lines_list_semicolon_extract)
                #print(words_id_array[lines_zero])
                #print(ms_data_VariationID_list[indexfff])
                #print(lines_list_semicolon_extract[lines_first_letter_archive])
                #print(words_base_beg_patient_array[lines_zero])        
                #print(lines_list_semicolon_extract[lines_second_letter_archive])        
                #print(words_base_end_patient_array[lines_zero])        

                if lines_list_semicolon_extract[lines_first_letter_archive] == words_base_beg_patient_array[lines_zero] and lines_list_semicolon_extract[lines_second_letter_archive] == words_base_end_patient_array[lines_zero]:
                    #print("It is active.")
                    article_var = re.sub(r'INFO=', 'INFO=PATHOGEN;', lines_array[lines_zero])
                    info_replaced_array.append(article_var)
                else: 
                    article_var = re.sub(r'INFO=', 'INFO=NON-PATHOGEN;', lines_array[lines_zero])
                    info_replaced_NONPATHOGEN_array.append(article_var)
            else: 
                article_var = re.sub(r'INFO=', 'INFO=NOMATCH', lines_array[lines_zero])
                info_replaced_NOMATCH_array.append(article_var)

            lines_zero = lines_zero + 1


        hashtag_array = []
        lines_zero = 0
        lines_length = len(lines)
        while lines_zero < lines_length:
            test_var = lines[lines_zero]
            if re.search(r'[#]', test_var):
                hashtag_array.append(test_var)
            lines_zero = lines_zero + 1


        #WRITE TEXT TO NEW FILE
        joinedlists = hashtag_array + info_replaced_array + info_replaced_NONPATHOGEN_array + info_replaced_NOMATCH_array

        joinedlists_name = "output/" + name_list_split_joined + "_annotated_PATHOGEN_FILTERED.vcf"

        with open(joinedlists_name, mode="w") as joinedfile:
            joinedfile.write("".join(joinedlists))


        print("The pathogen filtration is finished.")




    #PART8: QC for SAM/BAM is performed using "lqc" (NOT ACTIVE - problem with "pysam").
    lqc_checker = "inactive"    
    if lqc_checker == "active":     
        package_name = 'pandas'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install pandas')
        package_name = 'numpy'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install numpy')
        package_name = 'matplotlib'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install matplotlib')
        package_name = 'pysam'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install pysam')
        package_name = 'lqc'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install lqc')
        
        os.system(f'lqc -b output/{name_list_split_joined}.bam -o output')        
        
        
        
         


    #MultiQC is run on the folder "output". 
    multiqc_checker = "active"   
    multiqc_checker = multiqc_config_settings[2]    
    if multiqc_checker == "active": 
        print("\n MultiQC is run on the folder output. Wait. \n")  
        package_name = 'multiqc'         
        if importlib.util.find_spec(package_name) is None:        
            os.system('py -m pip install multiqc') #MultiQC is downloaded and installed automatically. Requires Python 3.8 or higher. Note: Instead of "py", can use "python".
        import multiqc
        output_path = current_directory + "/output"
        os.chdir(output_path)        
        multiqc.run(output_path)  
        os.chdir(current_directory)        
        #os.system(f'multiqc output -n {name_list_split_joined}_multiqc_report_final.html -o output') #Reports are now generated based on the fastqc-files in the directory "input".      


    if trimmomatic_file_name in trimmomatic_folder_files:    
    #if trim_ask == "No" or trim_ask == "no" or trim_ask == "N" or trim_ask == "n" or trim_ask == "nej":      
        os.system(f'del input/{inputvar[inputvar_zero]}')    
    
    inputvar_zero = inputvar_zero + 1

print("\n The program is finished. \n")

#close_sign = input('\n Press enter to close down the program. \n')