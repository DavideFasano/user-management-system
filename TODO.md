https://www.edureka.co/blog/decrypt-md5-password-PHP/

- Aggiungere la password
  - [ ] aggiungere attributo password nel database
  - [ ] aggiungere campo password nel form
  - [ ] aggiungere proprietà password alla classe User

  - Impostare la mail come  chiave unica nella tabella degli utenti. 
  - how to set unique key in mysql 

<!-- - Quando crei un nuovo utente si cripta la password -->

- [ ] Implementare la schermata di logIn
    - [ ]  **login_user.php** controller
    - [ ]  form inserisco email/username / password
    - [ ]  implementare **UserModel::autenticate($username,$password):?User**
    - [ ]  se l'utente esiste accedo all'elenco degli utenti

<<<<<<< HEAD
    - [x] **UserModel::readOne($user_id)** (dati di un solo utente) 
  
  > FIX: argomenti di User nel costruttore (vedi sopra)
  
    - [ ] **User::update(User $user)** update (modifica)

 # Pagina con elenco utenti TASK-3
  PAGINE (controller)
  - a.[x] Elenco degli utenti **list_user.php**
  
  
  
  
  --------------------------------------------------
  
  qualcuno a premuto aggiungi
     - [ ] creo un istanza User
     - [ ] Effettuo la validazione è sanificazione dei valori dell'istanza di User
     - [ ] se tutto è ok salvo l'utente --> si va a una pagina di conferma
                 [ ] Istanza del model uso il metodo create 
     - [ ] se non è tutto ok rimango sul form e segnalo gli errori

     per ogni errore / campo
     *firstName "Mario" *lastName vuoto
     rimango nel form
     *firstName "MArio" *lasName 
      Risultato della validazione
                           - messaggio "campo obbligatorio"
      isValid = true       - isValid = false 
                           - code
      valore 
      ''
      "Mario"              - ''




- Aggiungere la password
  - [x] aggiungere attributo password nel database 
  - [x] aggiungere campo password nel form
  - [x] aggiungere propietà password nella classe User

- Impostare una chiave unica sulla mail (non ci possono essere due utenti con la stessa mail)
- Quando crei un nuovo utente di crypta la password


- [ ] Implementare la schermata di logIn
  - [x] **login_user.php** controller
  - [x] form dove inserisco email e password
  - [ ] aggiungere **UserModel::autenticate($username,$password):?User**     submit, dati via post 
  - [ ] se l'utente esiste accedo all'elenco degli utenti


  - [] creare tabella interesse(interesseId, nome)
  - [] creare tabella user_interesse(userId,interesseId)

  - [] creare InteresseModel
  - [] modificare crud utenti per permettere di selezionare un interesse

    - [] CREATE USER - ottenere id di un utente appena creato
    - [] inserire nella tabella user_interesse userId appena creato e InteresseId selezionato

    - [] EDIT USER - trovare interesse dell'utente gia selezionato nel select

    - [] DELETE USER - cancellare riferimento nella tabella user_interesse

    - [] DELETE INTERESSE - cancellare riferimenti nella tabella user_interesse
=======
>>>>>>> 04d871ed19dd9363821369142102b4999f479bc5
