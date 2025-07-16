import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By

class SignupPageTest(unittest.TestCase):
    def setUp(self):
        self.driver = webdriver.Chrome()

    def tearDown(self):
        self.driver.quit()

    def test_donor_registration(self):
        driver = self.driver
        driver.get("http://localhost/medicine/signup.php")

        donor_first_name = driver.find_element(By.ID,"donor_first_name")
        donor_last_name = driver.find_element(By.ID,"donor_last_name")
        donor_address = driver.find_element(By.ID,"donor_address")
        donor_email = driver.find_element(By.ID,"donor_email")
        donor_password = driver.find_element(By.ID,"donor_password")
        donor_password2 = driver.find_element(By.ID,"donor_password2")
        donor_phone = driver.find_element(By.ID,"donor_phone")
        donor_register = driver.find_element(By.ID,"donor_register")

        #donor registration input data
        donor_first_name.send_keys("Nikesh")
        donor_last_name.send_keys("Tiwari")
        donor_address.send_keys("35 Columbia Street West")
        donor_email.send_keys("ntiwari7499@conestogac.on.ca")
        donor_password.send_keys("Nikesh")
        donor_password2.send_keys("Nikesh")
        donor_phone.send_keys("1234567890")

        #donor registration button
        donor_register.click()

        self.assertEqual(driver.current_url, "http://localhost/medicine/login.php")

    def test_receiver_registration(self):
        driver = self.driver
        driver.get("http://localhost/medicine/signup.php")

        receiver_name = driver.find_element(By.ID,"receiver_name")
        receiver_regd_no = driver.find_element(By.ID,"receiver_regd_no")
        receiver_address = driver.find_element(By.ID,"receiver_address")
        receiver_email = driver.find_element(By.ID,"receiver_email")
        receiver_password = driver.find_element(By.ID,"receiver_password")
        receiver_password2 = driver.find_element(By.ID,"receiver_password2")
        receiver_phone = driver.find_element(By.ID,"receiver_phone")
        receiver_register = driver.find_element(By.ID,"receiver_register")

        # receiver registration input data
        receiver_name.send_keys("Conestoga College")
        receiver_regd_no.send_keys("123456")
        receiver_address.send_keys("108 University Ave, Waterloo, ON N2J 2W2")
        receiver_email.send_keys("waterloo@conestogac.on.ca")
        receiver_password.send_keys("conestoga")
        receiver_password2.send_keys("conestoga")
        receiver_phone.send_keys("9876543210")

        # receiver registration submit button
        receiver_register.click()

        self.assertEqual(driver.current_url, "http://localhost/medicine/login.php")

    def test_admin_login(self):
        driver = self.driver
        driver.get("http://localhost/medicine/login.php")

        # admin login details
        driver.find_element(By.ID,"admin_email").send_keys("admin@gmail.com")
        driver.find_element(By.ID,"admin_password").send_keys("admin")

        # admin login submit button
        driver.find_element(By.ID,"admin_login_submit").click()
        
        self.assertEqual(driver.current_url, "http://localhost/medicine/admin/admin-index.php")


unittest.main()
