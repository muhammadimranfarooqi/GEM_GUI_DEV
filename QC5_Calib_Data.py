#!/usr/bin/env python
from datetime import datetime,date,time
from time import sleep
from xml.etree.ElementTree import Element, SubElement, Comment, tostring
import serial
import time
import xlrd
from xlrd import xldate
import re
import sys
import statistics
from xmlConversion import generateXMLHeader, generateDataSet, writeToFile,writeToFile1
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s
from flask import Flask, render_template
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import create_engine, MetaData, Table, and_
from sqlalchemy.sql import select
import cx_Oracle


#QC5
if ch==5:
	def xml_from_excel5(excel_file):
		wb = xlrd.open_workbook(excel_file)
		sh = wb.sheet_by_index(0)
		user = sh.cell(0,1).value
		chamber=sh.cell(10,1).value
		pre = raw_input("Please Enter Preamplifier Name:")
		amp = sh.cell(3,1).value
		coa = sh.cell(4,1).value
		fine = sh.cell(5,1).value
		itime = sh.cell(6,1).value
		dtime = sh.cell(7,1).value
		disc = sh.cell(26,1).value
		thrs = sh.cell(27,1).value
		walk = sh.cell(28,1).value
		width = sh.cell(29,1).value
		scal = sh.cell(39,1).value
		daq = sh.cell(40,1).value
		pico = sh.cell(32,1).value
		tred = sh.cell(33,1).value
		tblack = sh.cell(34,1).value
		tgreen = sh.cell(35,1).value
		source = sh.cell(43,1).value
		hvlt = sh.cell(44,1).value
		current = sh.cell(45,1).value
		nbpri = "346"
		eta = sh.cell(11,1).value
		gas = sh.cell(12,1).value
		gfac = sh.cell(13,1).value
		flow = sh.cell(14,1).value
		req = sh.cell(15,1).value
		divi = sh.cell(16,1).value
		root = generateXMLHeader("QC5_GAIN_STBLTY_CONFIG","GEM Chamber QC5 Gain Stability","CERN Station A GEM Chamber QC5 Gain Stability",Run,Start,Stop,comment,location,user)
		dataSet = generateDataSet(root,"GEM Chamber QC5 Gain Stability Config","1","GEM Chamber",chamber)
		generateXMLData5a(dataSet,str(user),pre,str(amp),str(coa), str(fine), str(itime),str(dtime),str(disc),str(thrs),str(walk),str(width),str(scal),str(daq),str(pico),str(tred),str(tblack),str(tgreen),str(source),str(hvlt),str(current),str(nbpri),str(eta),str(gas),str(gfac),str(flow),str(req),str(divi))
		writeToFile(fileName, tostring(root))
	
		root = generateXMLHeader("QC5_GAIN_STBLTY_DATA","GEM Chamber QC5 Gain Stability Data","CERN Station A GEM Chamber QC5 Gain Stability",Run,Start,Stop,comment,location,user)
		dataSet = generateDataSet(root,"GEM Chamber QC5 Gain Stability Data","1","GEM Chamber",chamber)
		for row in range(6,sh.nrows):
			if row ==33:
				break
			test_time=str(Start[0:10])
			humidity=raw_input("Please write Humidity Value:")
			vmon= sh.row_values(row)[5]
			imon= sh.row_values(row)[6]
			time= sh.row_values(row)[21]
			pressure= sh.row_values(row)[22]
			temp= sh.row_values(row)[23]
			s_count= sh.row_values(row)[24]
			s_error= sh.row_values(row)[25]
			off_count= sh.row_values(row)[26]
			off_error= sh.row_values(row)[27]
			s_current= sh.row_values(row)[28]
			s_current_error= sh.row_values(row)[29]
			off_current= sh.row_values(row)[30]
			off_current_error= sh.row_values(row)[31]
			generateXMLData5(dataSet,str(test_time),str(temp),str(pressure),str(humidity), str(imon), str(vmon),str(s_count),str(s_error),str(off_count),str(off_error),str(s_current),str(s_current_error),str(off_current))
			writeToFile(datafile, tostring(root))
		#root = generateXMLHeader("QC5_GAIN_STBLTY_DATA_SUMMARY","GEM Chamber QC5 Gain Stability Data Summary","CERN Station A GEM Chamber QC5 Gain Stability Summary",Run,Start,Stop,comment,location,user)
		#dataSet = generateDataSet(root,"GEM Chamber QC5 Gain Stability Data Summary","1","GEM Chamber",chamber)
		
if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	datafile=fname+"_Data.xml"
	testfile=fname+"_summry.xml"
	xml_from_excel5(fname)
