# food_delivery_platform_Web
# Database project B10602211 俞恆劭
## Description
### 首頁畫面
![](https://i.imgur.com/UjXwZ6j.jpg)
![](https://i.imgur.com/IiqF1jo.png)

![](https://i.imgur.com/yUoOaWl.png =200x)

![](https://i.imgur.com/WoUP6I6.jpg =200x)

### 註冊 登入
![](https://i.imgur.com/F48L0ps.png)

![](https://i.imgur.com/BZBA3qI.png )

### 登入後會在右上角顯示使用者資訊
![](https://i.imgur.com/k6ZlQlf.png)!



## 客戶端
### 登入後 在首頁中選擇地區 餐廳
![](https://i.imgur.com/Ilfg41f.jpg)

![](https://i.imgur.com/1mPZQHy.jpg =200x)

### 在餐廳中選擇想要的餐點與數量 並填入聯絡資訊 (可在上方搜尋列 選擇食物種類)
![](https://i.imgur.com/u7fwAI0.png)
![](https://i.imgur.com/6tZr2ey.png)
### 顯示剛才所選的訂單內容(餐點名稱 數量 價錢 聯絡資訊) 確認內容無誤後點擊送出
![](https://i.imgur.com/BAHp7Fi.png)

![](https://i.imgur.com/pGQroLO.png =200x)


### 送出訂單後 顯示訂單資訊與當前狀態 
![](https://i.imgur.com/sn7Jqcy.png)

![](https://i.imgur.com/TLTfP8Z.png =200x)


### 點擊使用者資訊可查看所有訂單狀況 並且可變更及刪除
![](https://i.imgur.com/79EZ7fd.jpg)


#### 變更訂單內容
![](https://i.imgur.com/3Uib6Tb.png)
### 在網站上方點選"搜尋店家" 就可用關鍵字找尋出店家資訊
![](https://i.imgur.com/QcBVokF.png)

## 店家端
### 店家端首頁
![](https://i.imgur.com/QIOKY6y.jpg)
### 管理菜單
![](https://i.imgur.com/lwcbjHT.png)
### 新增
![](https://i.imgur.com/5XG7AqE.png)

### 變更內容
![](https://i.imgur.com/EasdROZ.png)

### 查看所有訂單 並可變更狀態
![](https://i.imgur.com/fliil0Q.jpg)

## 外送端

### 外送員端首頁
![](https://i.imgur.com/JV9BGqS.jpg)

### 顯示可接的單
![](https://i.imgur.com/XvfptEm.jpg)

### 接單後可變更訂單狀態
![](https://i.imgur.com/YuCJbBs.png)


## 架構

### 簡易運作流程圖
![](https://i.imgur.com/EHcuhwu.png)

### 資料庫內容
![](https://i.imgur.com/EIjd8zG.png)


* food_attribute :各項食物的屬性 包含種類 價格 名稱等
* food_order :紀錄送出的訂單狀況 包含下訂人資料 餐廳 食物名稱及數量 訂單編號 訂單狀態
* food_order_not_submit :暫存未送出的訂單
* manage_admin :記錄使用者帳號密碼
* order_status :對應顯示order_status屬性的狀況
* restaurant_attribute :紀錄餐廳資訊 包含名稱 位置 電話


