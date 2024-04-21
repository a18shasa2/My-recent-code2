#Raw data
Gender<-c("M","F","F","F","M","M","F","M","F","M")
Weight<-c(80,58,65,70,90,100,50,91,75,87)

#Bar chart
Gender<-factor(Gender)
df<-data.frame(Gender,Weight)
means<-tapply(Weight,Gender,mean)
pp<- barplot(means)
pp<-barplot(means,ylim=c(0,120),xlab="Gender",ylab="Mean weight (Kg)",names.arg= c("Female","Male"))

pp<-barplot(means,ylim=c(0,120),xlab="Gender",ylab="Mean weight (Kg)", col=c("red","blue"))

std<-tapply(Weight,Gender,sd)
arrows(pp,means+std,pp,means-std,angle=90,code=3,length=0.2)

#histogram revised
h<-hist(df$Weight[df$Gender=="M"])
x<-df$Weight[df$Gender=="M"]
xfit<-seq(65,110)
yfit<-dnorm(xfit,mean=mean(x),sd=sd(x))
yfit<-yfit*diff(h$mids[1:2])*length(x)
lines(xfit,yfit,col="blue",lwd=2)


#find confidence interval
data<-df$Weight[df$Gender=="F"]
t.test(data) 

#99% confidence interval
data<-df$Weight[df$Gender=="F"]
t.test(data,conf.level=0.99)