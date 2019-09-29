# -*- coding: utf-8 -*-
"""
Created on Wed Sep 18 21:15:07 2019

@author: ADMIN
"""

import numpy as np
import pandas as pd

# Importing the dataset
dataset = pd.read_csv('heart.csv')

X = dataset.iloc[:, 0:13].values
y = dataset.iloc[:, 13].values


from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.1, random_state = 0)

from keras.models import Sequential
from keras.layers import Dense

# Initialising the ANN
classifier = Sequential()

# Adding the input layer and the first hidden layer
classifier.add(Dense(output_dim = 11 , init = 'uniform', activation = 'relu', input_dim = 13))

# Adding the second hidden layer
classifier.add(Dense(output_dim = 10, init = 'uniform', activation = 'relu'))
classifier.add(Dense(output_dim = 9, init = 'uniform', activation = 'relu'))

classifier.add(Dense(output_dim = 6, init = 'uniform', activation = 'relu'))

# Adding the output layer
classifier.add(Dense(output_dim = 1, init = 'uniform', activation = 'sigmoid'))

# Compiling the ANN
classifier.compile(optimizer = 'adam', loss = 'binary_crossentropy', metrics = ['accuracy'])

# Fitting the ANN to the Training set
classifier.fit(X_train, y_train, batch_size = 10, nb_epoch = 100)
input1=[[68,0,0,115,248,0,1,158,1,0.6,2,2,1]]

x_new = np.array(input1)
prediction = classifier.predict(x_new) 

print("Predicted target value: {}\n".format(prediction > 0.5))
