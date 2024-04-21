#PCA on K-Means Clustering

#install.packages('ggplot2')
#install.packages('dplyr')
#install.packages('tidyverse')
#install.packages('cluster')
#install.packages('factoextra')
#install.packages('dataset')

library(tidyverse)
library(ggplot2)
library(dplyr)
library(cluster)
library(factoextra)
library(dataset) 

data(iris)
df <- cbind(iris$Sepal.Length, iris$Sepal.Width, iris$Petal.Length, iris$Petal.Width)

pca_iris = prcomp(df, center = TRUE, scale = TRUE)
summary(pca_iris)

iris_transform = as.data.frame(-pca_iris$x[,1:2])

factoextra::fviz_nbclust(iris_transform, kmeans, method = 'wss')
factoextra::fviz_nbclust(iris_transform, kmeans, method = 'silhouette')
factoextra::fviz_nbclust(iris_transform, kmeans, method = 'gap_stat')

k = 3

kmeans_iris = kmeans(iris_transform, centers = k, nstart = 50)
factoextra::fviz_cluster(kmeans_iris, data = iris_transform)


