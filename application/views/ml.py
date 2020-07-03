import numpy as np
import pandas as pd
from time import sleep
# Importing the dataset
dataset = pd.read_csv('final.csv')
#Assigning the parameters And the Target Value
X=dataset.iloc[:, :-1].values
y=dataset.iloc[:, 7].values
#Deviding the Dataset into Train and Test

from sklearn import model_selection
X_train,X_test,y_train,y_test= model_selection.train_test_split(X, y, test_size = 0.2, random_state = 0) 
#Creating the ml_model

def create_model():
    from sklearn.linear_model import LinearRegression
    reg=LinearRegression()
    reg.fit(X_train,y_train)
    y_pred= reg.predict(X_test)
    return reg
ml_model=create_model()

age=63
gender=1
BT=98
PR=89
BOL=97
SBP=145
DBP=92

pred_args=[age,gender,BT,PR,BOL,SBP,DBP]
pred_args_arr=np.array(pred_args)
pred_args_arr=pred_args_arr.reshape(1,-1)
#Writing predicted Critical INdex value
model_prediction=ml_model.predict(pred_args_arr)
model_prediction=round(float(model_prediction),2)
ci=(str(model_prediction))
print("CI:",ci)

    












