#version 1 (Mann-Whitney U test should be lower than 0.05 to indicate a significant difference)
Group<-c(1,2,2,2,2,2,2,1,2,2)
raw_data<-c(80,58,65,70,90,100,50,91,75,87)
raw_data_data<-data.frame(Group,raw_data)
raw_data_data
raw_data_data$raw_data
raw_data_data$Group
wilcox.test(raw_data_data$raw_data~raw_data_data$Group)
wilcox.test(raw_data~Group, data=raw_data_data)

#version 2
Raw_data_group1 <-c(138,141,143,148,135,136,144,138,134,141)
Raw_data_group2 <-c(142,139,144,138,143,135,131,135,141,132)
wilcox.test(Raw_data_group1,Raw_data_group2,correct=FALSE,exact=FALSE)
