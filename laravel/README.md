Все эндпоинты в routes/api.php
Задокументированные эндпоинты в laravel/astrology.json

Модели:

    1. Астролог:
        id, name, biography, email, photo (path to storage), timestamps
    
    
    2. Услуга (Service):
        id, name, description
        
    3. Заказ (Order):
        id, astrologist_id, service_id, email (customer`s), price, created_at
        
    4. Связь Астролог с Услугами через сводную таблицу astrologist_service с их айди и price
    
    
Запись в Google Sheet осуществляется через laravel/app/Services/GoogleSheet.php

Что добавить/реализовать:
    
    По продукту:
        Аутенфикация и история заказов
        Рейтинг астрологов, отзывы
        
    По коду:
        Тестирование (сделал только для проверки сидера)
        
