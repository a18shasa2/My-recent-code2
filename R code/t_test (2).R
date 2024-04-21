Gender<-c('M','F','F','F','F','F','F','M','F','F')
Weight<-c(80,58,65,70,90,100,50,91,75,87)
weight_data<-data.frame(Gender,Weight)
weight_data
weight_data$Weight
weight_data$Gender

#t-test (should be lower than 0.05 for significant difference)
t.test(weight_data$Weight~weight_data$Gender)
t.test(Weight~Gender, data=weight_data)