# -*- coding: utf-8 -*-
"""
Created on Wed Sep 18 19:46:40 2019

@author: ADMIN
"""
import sys
import numpy as np
import pandas as pd

# Importing the dataset
dataset = pd.read_csv('heart.csv')

X = dataset.iloc[:, 0:13].values
y = dataset.iloc[:, 13].values


from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.1, random_state = 0)

from sklearn.linear_model import LogisticRegression 

kn = LogisticRegression() 
kn.fit(X_train, y_train) 

l=[]
for i in range(1,14):
    c=int(sys.argv[i])
    l.append(c)
input1=[]
input1.append(l)
#print(input1)

x_new = np.array(input1)
prediction = kn.predict(x_new) 

#print("Predicted target value: {}\n".format(prediction))
if(prediction==[0]):
    print("NO")
else:
    print("YES")
#print("Test score: {:.2f}".format(kn.score(X_test, y_test))) 
