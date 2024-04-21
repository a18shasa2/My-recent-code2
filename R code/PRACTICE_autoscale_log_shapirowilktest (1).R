sex<-c(XXXXXX)
steroidE<-c(XXXXX)

#log transformation
steroidE<-log(steroidE)

#Autoscaling
library(mdatools)
steroidE_data<-data.frame(steroidE,sex)
data1 = prep.autoscale(steroidE_data, center = TRUE, scale = TRUE)

#Extract data from vector (above)
dataframe <- as.data.frame(data1)
steroidE_new <- dataframe$steroidE

#shapiro-wilk test
library(mvShapiroTest)
mat<-cbind(data1) 
#mat<-cbind(steroidE,Age) 
mvShapiro.Test(mat)

#kruskal-wallis test
kruskal.test(steroidE ~ sex, data=data1)

#mann-whitney u test
wilcox.test(steroidE~sex, data=data1)