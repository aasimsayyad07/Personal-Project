'''import cv2

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye_tree_eyeglasses.xml')
cap = cv2.VideoCapture('test.mp4')

while cap.isOpened():
    _, img = cap.read()
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    for (x, y , w ,h) in faces:
        cv2.rectangle(img, (x,y), (x+w, y+h), (255, 0 , 0), 3)
        roi_gray = gray[y:y+h, x:x+w]
        roi_color = img[y:y+h, x:x+w]
        eyes = eye_cascade.detectMultiScale(roi_gray)
        for (ex, ey ,ew, eh) in eyes:
            cv2.rectangle(roi_color, (ex,ey), (ex+ew, ey+eh), (0, 255, 0), 5)

    # Display the output
    cv2.imshow('img', img)
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

#result = cv2.VideoWriter('filename.avi', cv2.VideoWriter_fourcc(*'MJPG'),10)
cap.release()'''


import cv2

face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye_tree_eyeglasses.xml')
video = cv2.VideoCapture(0)

if (video.isOpened () == False):
    print ("Error reading video file")


frame_width = int (video.get (3))
frame_height = int (video.get (4))

size = (frame_width, frame_height)


result = cv2.VideoWriter ('filename.avi',
                          cv2.VideoWriter_fourcc (*'MJPG'),
                          10, size)

while (True):
    ret, frame = video.read ()

    if ret == True:

        result.write (frame)


        cv2.imshow ('Frame', frame)

    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    for (x, y , w ,h) in faces:
        cv2.rectangle(frame, (x,y), (x+w, y+h), (255, 0 , 0), 3)
        roi_gray = gray[y:y+h, x:x+w]
        roi_color = frame[y:y+h, x:x+w]
        eyes = eye_cascade.detectMultiScale(roi_gray)
        for (ex, ey ,ew, eh) in eyes:
            cv2.rectangle(roi_color, (ex,ey), (ex+ew, ey+eh), (0, 255, 0), 5)


    cv2.imshow('img', frame)
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break



video.release()