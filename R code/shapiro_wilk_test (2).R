Gender<-c('M','F','F','F','F','F','F','M','F','F')
Weight<-c(80,58,65,70,90,100,50,91,75,87)
weight_data<-data.frame(Gender,Weight)
weight_data
weight_data$Weight
weight_data$Gender

#shapiro-wilk test #1 (should be higher than 0.05 for normal distribution)
shapiro.test(weight_data$Weight[weight_data$Gender  == "F"])
shapiro.test(weight_data$Weight[weight_data$Gender  == "M"])

#shapiro-wilk test #2
library(mvShapiroTest)
mat<-cbind(Weight,Chol) # We must first create a matrix
mvShapiro.Test(mat)
-----------------------------------------------
Gender<-c('M','F','F','F','F','F','F','M','F','F')
Weight<-c(80,58,65,70,90,100,50,91,75,87)
weight_data<-data.frame(Gender,Weight)
weight_data
weight_data$Weight
weight_data$Gender

#shapiro-wilk test (should be higher than 0.05 for normal distribution)
shapiro.test(weight_data$Weight[weight_data$Gender  == "zero_level"]) #1.759e-11
shapiro.test(weight_data$Weight[weight_data$Gender  == "one_level"]) #2.753e-05
shapiro.test(weight_data$Weight[weight_data$Gender  == "three_level"]) #unknown

#shapiro-wilk test #2
library(mvShapiroTest)
mat<-cbind(Weight,Gender) # We must first create a matrix
mvShapiro.Test(mat)