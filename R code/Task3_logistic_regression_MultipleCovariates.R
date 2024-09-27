#The samples with NA have been removed.

library(cli)
library(data.table)
library(dplyr)
library(tidyr)
library(ggplot2)
library(tidyverse)
library(readxl)
library(FactoMineR)
library(factoextra)
library(ggpubr)
library(factoextra)
library(FactoMineR)

library(purrr)

setwd("C:/Users/User/Downloads/testpackage_postdoc_bioinformatician_metabolomics/testpacket_UFV-PA 2023_3171")

data <- read_xlsx("Task3a_excel_rawdata.xlsx")

Age<-data$age

Sex<-data$sex

diabetes_baseline<-data$diabetes_baseline

m81071t150190<-data$m81071t150190

Sex<-factor(data$sex)

diabetes_baseline=factor(diabetes_baseline,level=c(0,1)) # Baseline = no

df=data.frame(Age,Sex,diabetes_baseline,m81071t150190) 

#DV is on the left. IV is on the right. 
fit <- glm(diabetes_baseline~ m81071t150190+Age+Sex,data=df,family=binomial())
fit # Print output

exp(coef(fit))

exp(cbind(coef(fit),confint.default(fit)))

summary(fit) #print all. P-values are in "Pr(>|z|)"

#Bonferroni correction:
library(purrr)
#Unnadjusted p.values:
  
  fit |>
  summary() |>
  pluck(coefficients) |>
  (\(x) x[-1, 4])()

#adjusted p.values with Bonferroni:
  
  fit |>
  summary() |>
  pluck(coefficients) |>
  (\(x) x[-1, 4])() |>
  p.adjust(method = 'bonferroni')
