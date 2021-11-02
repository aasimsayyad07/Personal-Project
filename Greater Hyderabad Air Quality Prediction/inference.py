import numpy as np
import pandas as pd
import pickle


pickle_in = open("Random_forest_regressor.pkl","rb")
random_forest_regressor=pickle.load(pickle_in)

Average_Temperature= '27.9'
Maximum_Temperature = '31.5'
Minimum_Temperature = '20.6'
Atm_pressure_at_sea_level = '1011.5'
Average_wind_speed = '8.5'

class_names=[Average_Temperature,Maximum_Temperature,Minimum_Temperature,Atm_pressure_at_sea_level,Average_wind_speed]
def predict(df):

  df = [ Average_Temperature,Maximum_Temperature,Minimum_Temperature, Atm_pressure_at_sea_level,Average_wind_speed]
  predictions=random_forest_regressor.predict([[ Average_Temperature,Maximum_Temperature,Minimum_Temperature, Atm_pressure_at_sea_level,Average_wind_speed]])
  print(predictions)
  return predictions