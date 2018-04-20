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

	def xml_from_excel4(excel_file):
		wb = xlrd.open_workbook(excel_file)
		sh = wb.sheet_by_index(0)
		req = sh.cell(1,16).value
		pre = sh.cell(5,16).value
		amp = sh.cell(8,16).value
		coa = sh.cell(9,16).value
		fine = sh.cell(10,16).value
		itime = sh.cell(12,16).value
		dtime = sh.cell(13,16).value
		disc = sh.cell(16,16).value
		thrs = sh.cell(17,16).value
		scal = sh.cell(20,16).value
		daq = sh.cell(21,16).value
		Start=str(ObtainDate("Test Start Time(with Date like 2017-01-16):","%Y-%m-%d %H:%M:%S"))
		Stop=str(ObtainDate("Test End Time:","%Y-%m-%d %H:%M:%S"))
		chamber=raw_input("Please Enter a Chamber Name:")
		Date=str(Start[0:10])
		location=raw_input("Enter Location:")
		user=sh.cell(1,7).value
		comment=raw_input("Make a Comment:")
		Run=db.engine.execute("select nvl(max(run.RUN_NUMBER), 0) + 1 from cms_gem_core_cond.cond_data_sets dat join cms_gem_core_cond.kinds_of_conditions koc on dat.KIND_OF_CONDITION_ID = koc.KIND_OF_CONDITION_ID join CMS_GEM_CORE_CONSTRUCT.PARTS par on par.PART_ID = dat.PART_ID join CMS_GEM_CORE_COND.COND_RUNS run on dat.COND_RUN_ID = run.COND_RUN_ID where koc.IS_RECORD_DELETED = 'F' and par.IS_RECORD_DELETED = 'F' and koc.name = '' and par.SERIAL_NUMBER = '"+chamber+"'")
		Run = [ t for t, in Run ]
		root = generateXMLHeader("QC4_HVTEST_CONFIG","GEM Chamber QC4 HV TEST Configuration","CERN Station A GEM QC4 HV Test",Run,Start,Stop,comment,location,user)
		dataSet = generateDataSet(root,"GEM Chamber QC4 HV TEST Configuration","1","GEM Chamber",chamber)
		generateXMLData4a(dataSet,str(req), str(pre),str(amp),str(coa), str(fine), str(itime),str(dtime),str(disc),str(thrs),str(scal),str(daq))
		writeToFile(fileName, tostring(root))
		root = generateXMLHeader("QC4_HVTEST_DATA","GEM Chamber QC4 HVTEST Data","CERN Station A GEM QC4 HV Test",Run,Start,Stop,comment,location,user)
		dataSet = generateDataSet(root,"GEM Chamber QC4 HVTEST Data","1","GEM Chamber",chamber)
		for row in range(3, sh.nrows):
			if row == 37:
				break
			vset = sh.row_values(row)[0]
			vmon= sh.row_values(row)[1]
			iset =sh.row_values(row)[2]
			imon= sh.row_values(row)[3]
			rcal =sh.row_values(row)[4]
			rnorm=sh.row_values(row)[5]
			count=sh.row_values(row)[6]
			rate= sh.row_values(row)[7]
			error=sh.row_values(row)[8]
			generateXMLData4(dataSet,str(vset), str(vmon),str(iset),str(imon), str(rcal), str(rnorm),str(count),str(rate),str(error))
			writeToFile(datafile, tostring(root))
		
		v_max = sh.cell(25,16).value
		test_date=str(Start[0:10])
		v_drift = sh.cell(26,16).value
		i_max = sh.cell(27,16).value
		r_euq = sh.cell(28,16).value
		r_err= sh.cell(29,16).value
		r_diff = sh.cell(30,16).value
		spr_signal = sh.cell(31,16).value
		spr_error = sh.cell(32,16).value
		Filename= raw_input("Please Enter the FileName:")
		Elog=raw_input("Please Enter the Elog Link:")
		Comment=raw_input("Write a Summary Comment:")
		root = generateXMLHeader("QC4_HVTEST_SUMMARY","GEM Chamber QC4 HVTEST Summary","CERN Station A GEM QC4 HV Test Summary",Run,Start,Stop,Comment,location,user)
		dataSet = generateDataSet(root,"GEM Chamber QC4 HVTEST Summary","1","GEM Chamber",chamber)
		generateXMLData4s(dataSet,str(test_time),str(v_max),str(i_max),str(v_drift),str(r_euq), str(r_err), str(r_diff),str(spr_signal),str(Filename),str(Elog),str(Comment))
		writeToFile(testfile, tostring(root))

if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	datafile=fname+"_Data.xml"
	testfile=fname+"_summry.xml"
	xml_from_excel4(fname)
