#PCA clustring with prcomp.

#install.packages('dataset')
library(ellipse)
library(dataset) 

#Iris all rows, first 4 columns with data.
#Change color number and positions for levels.

pca=prcomp(iris[,1:4],scale=FALSE)
plot(pca$x[,1:2])
plot(pca$x[,1:2],col=iris$Species)
legend("topright", legend=levels(iris$Species),pch=1, col=1:3)
alfa=0.05
PC=pca$x[,1:2]
lines(ellipse(cov(PC[1:50,]),centre=colMeans(PC[1:50,]),level=1-alfa),col=1)
lines(ellipse(cov(PC[51:100,]),centre=colMeans(PC[51:100,]),level=1-alfa),col=2)
lines(ellipse(cov(PC[101:150,]),centre=colMeans(PC[101:150,]),level=1-alfa),col=3)

pca=prcomp(iris[,1:4])
biplot(pca)