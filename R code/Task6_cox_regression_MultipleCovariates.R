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

library(survival)
library(ranger)
library(ggplot2)
library(dplyr)
library(ggfortify)


setwd("C:/Users/User/Downloads/testpackage_postdoc_bioinformatician_metabolomics/testpacket_UFV-PA 2023_3171")

data <- read_xlsx("Task6_excel_rawdata.xlsx")

Age<-data$age

Sex<-data$sex

m357279t319415<-data$m357279t319415

Sex<-factor(data$sex)

BMI<-data$bmi

Glucose<-data$glucose

df=data.frame(Age,Sex,BMI,Glucose,m357279t319415) 

#Cox regression
cox <- coxph(Surv(data$time, data$status) ~ m357279t319415 + Age + Sex + Glucose + BMI, data = df)
summary(cox)


#Logistic regression
fit <- glm(diabetes_baseline~ m357279t319415+Age+Sex+Glucose+BMI,data=df,family=binomial())
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
