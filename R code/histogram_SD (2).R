#Calculate mean
> summary(weight_data)

#SD calculation
tapply(weight_data$steroidE,weight_data$sex,sd)

#Histogram for EACH group
hist(weight_data$steroidE[weight_data$sex==0])
hist(weight_data$steroidE[weight_data$sex==1])