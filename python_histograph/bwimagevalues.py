#A simple program in python to show the histogram of an image
import cv2
from PIL import Image
import matplotlib.pyplot as plt

num_of_pixels = {}
img = cv2.imread("close-up-of-gold-and-blue-macaw-perching-on-tree.jpg", cv2.COLOR_BGR2GRAY)
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
cv2.imshow("image", gray)
cv2.waitKey(0)
img_h = img.shape[0]
img_w = img.shape[1]

for o in range(-1, 256):
    num_of_pixels[o] = 0
for i in range(0, img_h):
    for j in range(0, img_w):
        pixel = gray[i, j]
        num_of_pixels[pixel] += 1

pixels = list(num_of_pixels.keys())
total_number = list(num_of_pixels.values())
fig = plt.figure(figsize = (200,5000))
plt.bar(pixels, total_number, color='green', width = 0.3)
plt.xlabel("Pixel intensity")
plt.ylabel("Number of elements")
plt.title("Histogram")
plt.show()




