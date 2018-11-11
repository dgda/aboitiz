import cv2
import imutils
import time
import webbrowser
import numpy as numpy
from firebase import firebase
import datetime


cap = cv2.VideoCapture(0)
cap.set(3,700)
cap.set(4,700)
malecount = 0 
femalecount = 0 
MODEL_MEAN_VALUES = (78.4263377603, 87.7689143744, 114.895847746)
now = datetime.datetime.now()
ten = now + datetime.timedelta(seconds=5)

genders_list = ['Male', 'Female']

gender_net = cv2.dnn.readNetFromCaffe('deploy_gender.prototxt', 
		'gender_net.caffemodel')

font = cv2.FONT_HERSHEY_SIMPLEX

while True:
    femalecount = 0
    malecount = 0
    ret, image = cap.read()
    face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_alt.xml')
    gray = cv2.cvtColor(image,cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 5)
    now = datetime.datetime.now()
    
    for(x,y,w,h) in faces:
        cv2.rectangle(image, (x,y), (x+w, y+h), (255,255,0), 2)

        face_img = image[y:y+h, h:h+w].copy()
        blob = cv2.dnn.blobFromImage(face_img, 1, (227, 227), MODEL_MEAN_VALUES, swapRB=False)

        gender_net.setInput(blob)
        gender_preds = gender_net.forward()
        gender = genders_list[gender_preds[0].argmax()]
    
        if(gender == "Female"):
            femalecount += 1
        elif(gender == "Male"):
            malecount += 1
           
 

                       

               
            



        overlay_text = "%s" %(gender)
        cv2.putText(image, overlay_text, (x, y), font, 1, (255, 255, 255), 2, cv2.LINE_AA)

        print("There is atleast {} female in this frame".format(femalecount))
        print("There is atleast {} male in this frame".format(malecount
        ))
        
            
        cv2.imshow('FRAME', image)

        if(cv2.waitKey(1) & 0xFF == ord('q')):
            break
    if(now > ten):
        ten = now + datetime.timedelta(seconds=5)
        if(malecount  < femalecount):
            
          
            newcap = cv2.VideoCapture("ex11.mp4")
            
            fgbg = cv2.createBackgroundSubtractorMOG2()
            kernelOp = numpy.ones((3,3), numpy.uint8)
            kernelCl = numpy.ones((11,11), numpy.uint8 )
            while (1):
                ret, adframe = newcap.read()
                fgmask = fgbg.apply(adframe)
                try:
                    ret, imBin = cv2.threshold(fgmask, 200, 255, cv2.THRESH_BINARY)
                    mask = cv2.morphologyEx(imBin, cv2.MORPH_OPEN, kernelOp)
                    mask = cv2.morphologyEx(mask, cv2.MORPH_CLOSE, kernelCl)
                except:
                    print('EOF')
                    break

                cv2.imshow("Adframe", adframe)
                k = cv2.waitKey(30) & 0xff
                if k == 27 :
                    break
            newcap.release()
           
        else:
           
            
            newcap = cv2.VideoCapture("sx11.mp4")
            fgbg = cv2.createBackgroundSubtractorMOG2()
            kernelOp = numpy.ones((3,3), numpy.uint8)
            kernelCl = numpy.ones((11,11), numpy.uint8)
            while (1):
                ret, adframe = newcap.read()
                fgmask = fgbg.apply(adframe)
                try:
                    ret, imBin = cv2.threshold(fgmask, 200, 255, cv2.THRESH_BINARY)
                    mask = cv2.morphologyEx(imBin, cv2.MORPH_OPEN, kernelOp)
                    mask = cv2.morphologyEx(mask, cv2.MORPH_CLOSE, kernelCl)
                except:
                    print('EOF')
                    break

                cv2.imshow("Adframe", adframe)
                k = cv2.waitKey(30) & 0xff
                if k == 27 :
                    break
            newcap.release()
            
