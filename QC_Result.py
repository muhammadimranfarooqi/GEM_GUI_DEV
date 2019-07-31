#!/usr/bin/env python
from datetime import datetime,date,time
#from time import sleep
from xml.etree.ElementTree import Element, SubElement, Comment, tostring
#import serial
import time
import xlrd
from xlrd import xldate
import re
import sys
#import statistics
from xmlConversion import generateXMLHeader, generateDataSet, writeToFile,writeToFile1
from xmlConversion import generateXMLDataQCResult


#QC3
def xml_data_generation(excel_file):
	chamber=sys.argv[2]
	qc_test = sys.argv[3]
	qc_result = sys.argv[4]
        elog_link = sys.argv[5]
        comment = sys.argv[6]
	
	root = generateXMLHeader("QC_RESULT","GEM Chamber QC Result","GEM Chamber QC Result","","","",comment,"","")
	dataSet = generateDataSet(root,comment,"1","GEM Chamber",chamber)	
	generateXMLDataQCResult(dataSet,str(qc_test),str(qc_result),str(elog_link), str(comment))
	writeToFile(fileName, tostring(root))


if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	#datafile=fname+"_Data.xml"
	#testfile=fname+"_summry.xml"
	xml_data_generation(fname)	
