#log transformation
steroidE<-log(steroidE)

#Autoscaling
steroidE_data<-data.frame(sex,steroidE)
data1 = prep.autoscale(steroidE_data, center = TRUE, scale = TRUE)