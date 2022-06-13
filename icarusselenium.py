from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By

driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))
driver.get("https://icarus-icsd.aegean.gr")

results = {"Number":[], "Lesson_Code":[], "Title":[], "Grade":[], "Semester":[], "Submit_date":[], "Exam_date":[], "Status":[]}

username_box = driver.find_element(by=By.NAME, value="username")
password_box = driver.find_element(by=By.NAME, value="pwd")
login_button = driver.find_element(by=By.NAME, value="edit")
print("Enter username")
username = input()
print("Enter password")
password = input()
username_box.send_keys(username)
password_box.send_keys(password)
login_button.click()

reverse = driver.find_element(by=By.CLASS_NAME, value="tablesorter-header-inner")
reverse.click()
last_element = driver.find_element(by = By.XPATH, value="//*[@id='analytic_grades']/tbody/tr[1]/td[1]").text
last_element = int(last_element)
for i in range(1,last_element):
    i = str(i)
    Number = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[1]").text
    Lesson_Code = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[2]").text
    Title = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[3]").text
    Grade = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[4]").text
    Semester = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[5]").text
    Submit_date = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[6]").text
    Exam_date = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[7]").text
    Status = driver.find_element(by = By.XPATH, value ="//*[@id='analytic_grades']/tbody/tr[" + i + "]/td[8]").text
    results["Number"].append(Number)
    results["Lesson_Code"].append(Lesson_Code)
    results["Title"].append(Title)
    results["Grade"].append(Grade)
    results["Semester"].append(Semester)
    results["Submit_date"].append(Submit_date)
    results["Exam_date"].append(Exam_date)
    results["Status"].append(Status)

print(results["Number"])
driver.quit()

