import cv2
import numpy as np
imgr = r'C:\Users\TOSHIBA\Desktop\face.jpg'

face_casecade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')

img = cv2.imread(imgr)



faces = face_casecade.detectMultiScale(img , 1.1 , 4)
for (x, y, w, h) in faces:
    cv2.rectangle(img,  (x,y), (x+w,y+h) , (255,0,0)  , 2)



print("number of faces found {}".format(len(faces)))
cv2.imshow('face',img)
cv2.waitKey()


cv2.destroyAllWindows()

