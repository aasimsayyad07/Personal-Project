import csv
import pandas
import xlsxwriter
import openpyxl

csv_file = pandas.read_csv('HAM10000_metadata.csv',index_col="image_id")
print('start')
#workbook = xlsxwriter.Workbook ('task2 10ary.xlsx')
workbook=openpyxl.load_workbook(filename='cnn_data.xlsx')
print('a')
w_sheet=workbook['Sheet1']
print('b')
for i in range(2,10002):
    print(i)
    cell=w_sheet[i][1001]
    v=cell.value
    #print(v)
    category=csv_file['dx'][v[0:-4]]
    #w_sheet[i][6]=category
    w_sheet.cell(row=i, column=1001, value=category)
workbook.save(filename='cnn_data_and_category.xlsx')
print("done")
