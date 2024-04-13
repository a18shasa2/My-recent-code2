#!/usr/bin/env py

import pandas as pd
import numpy as np
import scipy.stats as sts

#Write the filename and gene name.
file_name = input('Write the file name:\n')

gene_name = input('Write the gene name:\n')

ms_data = pd.read_csv(file_name, sep = '\t')


#Extract SYMBOL column from csv-file.
ms_data_symbol = ms_data.SYMBOL

#Check whether gene is present in file.
ms_data_symbol_length = len(ms_data_symbol)

value_zero = 0
while value_zero < ms_data_symbol_length:
    if gene_name == ms_data_symbol[value_zero]:
        value_list = value_zero
    value_zero = value_zero + 1


#Calculate Q25, Q75 and IQR.
list_columns_names = list(ms_data)
list_columns_names.pop(0)
list_columns_names_zero = 0
list_columns_names_length = len(list_columns_names)

#print(list_columns_names)

q25_array_list = []
q75_array_list = []
iqr_array_list = []

ms_data_ms1 = ms_data.ms1
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms2
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms3
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms4
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms5
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms6
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms7
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms8
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms9
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms10
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms11
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms12
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms13
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.ms14
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control1
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control2
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control3
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control4
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control5
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control6
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control7
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control8
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control9
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control10
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control11
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control12
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control13
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

ms_data_ms1 = ms_data.control14
q75, q25 = np.percentile(ms_data_ms1, [75 ,25])
iqr = q75 - q25
q25_array_list.append(q25)
q75_array_list.append(q75)
iqr_array_list.append(iqr)

#Extract ABAT row from csv-file.
test1_variable = list(ms_data.iloc[value_list])
test1_variable.pop(0)

lower_q1 = []
above_q3 = []

test1_variable_zero = 0
test1_variable_length = len(test1_variable)
while test1_variable_zero < test1_variable_length:
    if test1_variable[test1_variable_zero] < q25_array_list[test1_variable_zero]:
        lower_q1.append(test1_variable[test1_variable_zero])
        
    if test1_variable[test1_variable_zero] > q75_array_list[test1_variable_zero]:
        above_q3.append(test1_variable[test1_variable_zero])

    test1_variable_zero = test1_variable_zero + 1 


print("\nThe data points that are below the first quartile for the gene", gene_name ,":", lower_q1)
print("The data points that are above the third quartile for the gene", gene_name ,":", above_q3)
