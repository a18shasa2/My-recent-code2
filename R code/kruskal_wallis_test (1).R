#Kruska-wallis test should be lower than 0.05 to show a signficnat difference.
raw_data<-c(7,8,10,11,4,5,7,8,1,2,4,5)
Group<-c(1,1,1,1,2,2,2,2,3,3,3,3)
Group<-factor(Group)
df<-data.frame(raw_data,Group)
kruskal.test(raw_data ~ Group, data=df)