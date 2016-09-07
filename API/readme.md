#API
This API will allow you to interact with the database VIA AJAX calls,
this API is designed to be used with JSON POST requests and uses RESTful API
URL names

## Contents
* [How to use](https://github.com/chloe747/WDA/tree/feature/REST-API/API#how-to-use-the-api)
* [Endpoints](https://github.com/chloe747/WDA/tree/feature/REST-API/API#endpoints)
* [Ticket](https://github.com/chloe747/WDA/tree/feature/REST-API/API#ticket)
  * [new](https://github.com/chloe747/WDA/tree/feature/REST-API/API#new)
  * [update](https://github.com/chloe747/WDA/tree/feature/REST-API/API#update)
  * [view](https://github.com/chloe747/WDA/tree/feature/REST-API/API#view)
  * [close](https://github.com/chloe747/WDA/tree/feature/REST-API/API#close)
* [Comment](https://github.com/chloe747/WDA/tree/feature/REST-API/API#comment)
  * [new](https://github.com/chloe747/WDA/tree/feature/REST-API/API#new-1)
  * [Staff Comment](https://github.com/chloe747/WDA/tree/feature/REST-API/API#staff-comment)
  * [viewall](https://github.com/chloe747/WDA/tree/feature/REST-API/API#view-all)
* [User](https://github.com/chloe747/WDA/tree/feature/REST-API/API#user)
  * [new](https://github.com/chloe747/WDA/tree/feature/REST-API/API#new-2)

## How to use the API
In order to send an AJAX call to this API, an example of sending an Jquery AJAX
call would be
```javascript
$.ajax({
  type: "POST",
  url: "/WDA/ticket/new",
  contentType: 'application/json',
  data: JSON.stringify({
    "user": {
      "email": "Email Here"
    },
    "ticket": {
      "osType": "OS Type here"
      "primaryIssue": "Write about issue here",
      "additionalNotes": "Additional Notes Here"
    }
  }),
  //callback function
});
```

## Endpoints
These are the following RESTful endpoints that you can access with POST requests
### Ticket
This endpoint is the main ticket creation and closing endpoint
#### New
* **URL**
```
/ticket/new
```

* **Description**

This endpoint will create a new ticket for the specified user, and if the user
does not exist in the database, should you provide a first name and a last
name, the endpoint will also create the user, then create the ticket

* **Parameters**

**Required**
```javascript
{
  "user": [Object] {
    "email": [String]
  },
  "ticket": [Object] {
    "osType": [String],
    "subject": [String],
    "primaryIssue": [String]
  }
}
```

**Optional**
```javascript
{
  "user": [Object] {
    "firstName": [String],
    "lastName": [String]
  },
  "ticket": [Object] {
    "additionalNotes": [String]
  }
}
```

* **Success Response**

*JSON* `{"success": true, "ticketId": [String]}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "user":{
        "firstName":"John",
        "lastName":"Doe",
        "email":"poo@ko.com"
    },
    "ticket":{
        "osType": "Mac",
        "subject": "Cockatiels",
        "primaryIssue": "Birb lel"
    }
}
```

#### Update
* **URL**
```
/ticket/update
```

* **Description**

This endpoint will update the specified ticket id with the filled out fields
that are filled out in the JSON, if you omit any ticket fields in the JSON
other than the ticketId field, then the update function will reuse the existing
value that is already stored in the database


* **Parameters**

**Required**
```javascript
{
  "ticket": [Object] {
    "ticketId": [String]
  }
}
```

**Optional**
```javascript
{
  "ticket": [Object] {
    "subject": [String],
    "osType": [String],
    "primaryIssue": [String],
    "additionalNotes": [String],
    "status": [String],
    "submitterId": [String]
  }
}
```

* **Success Response**

*JSON* `{"success": true}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
//to just update the status
{
    "ticket":{
        "ticketId": "477",
        "status": "Resolved"
    }
}

//update a few fields and keep the REST-API
{
    "ticket":{
        "ticketId": "477",
        "primaryIssue": "hello world yay",
        "additionalNotes": "more notes than i've taken in classes!"
    }
}
```
#### View
* **URL**
```
/ticket/view
```

* **Description**

This endpoint will give you the ticket information for a ticketId supplied

* **Parameters**

**Required**
```javascript
{
  "ticketId": [String]
}
```

* **Success Response**

*JSON*
```javascript
{
  "success": true,
  "ticket"[Object] {
    "ticket_id": [String],
    "subject": [String],
    "os_type": [String],
    "primary_issue": [String],
    "additional_notes": [String],
    "status": [String],
    "submitter_id": [String]    
  }
}
```

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "ticketId": "477"
}
```
#### View All Tickets
* **URL**
```
/ticket/viewAll
```

* **Description**

This endpoint will give you the ticket information for all ticket submitted tickets


* **Response**

*JSON*
```javascript
{
  "success": true,
  "ticket":[array] [
      {
          "ticket_id": [String],
          "subject": [String],
          "os_type": [String],
          "primary_issue": [String],
          "additional_notes": [String],
          "status": [String],
          "submitter_id": [String],
          "email": [String]  
      }        
  ]
}
```

* **Error Response**

*JSON* `{"success": false}`

#### Ticket and User Info
* **URL**
```
/ticket/ticketUser
```

* **Description**

This endpoint will give you the ticket information for a ticketId supplied and the user who submitted it

* **Parameters**

**Required**
  ```javascript
{
  "ticketId": [String]
}
  ```

* **Success Response**

*JSON*
  ```javascript
{
  "success": true,
  "ticket"[Object] {
    "ticket_id": [String],
    "subject": [String],
    "os_type": [String],
    "primary_issue": [String],
    "additional_notes": [String],
    "status": [String],
    "submitter_id": [String]    
  },
  "user"[Object]{
      "firstName": [String],
      "lastName": [String],
      "email": [String],
      "is_its" : [String]
  }
}
  ```

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "ticketId": "477"
}
```

#### Close
* **URL**
```
/ticket/close
```

* **Description**

This endpoint will close the ticket of the passed in ticketId

* **Parameters**

**Required**
  ```javascript
{
  "ticketId": [String]
}
  ```

* **Success Response**

*JSON* `{"success": true}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "ticketId": "477"
}
```
---
### Comment
This endpoint handles all of the comment related API calls
#### New
* **URL**
```
/comment/new
```

* **Description**

This endpoint will create a new comment for the specified ticket, and if the
commenting user does not exist in the database, should you provide a first
name, a last name, and an email, the endpoint also create the user,
then create the comment for the ticket

* **Parameters**

**Required**
```javascript
{
  "user": [Object] {
    "email": [String]
  },
  "comment": [Object] {
    "ticketId": [String],
    "comment": [String]
  }
}
```

**Optional**
```javascript
{
  "user": [Object] {
    "firstName": [String],
    "lastName": [String]
  }
}
```

* **Success Response**

*JSON* `{"success": true, "commentId": [String]}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "user":{
        "email": "mysterious.challenger@secret.tree.co"
    },
    "comment":{
        "ticketId": "6",
        "comment": "Who am I? None of your business"
    }
}
```
#### Staff Comment
* **URL**
```
/comment/staff
```

* **Description**

This endpoint will create a new comment for the specified ticket under the dummy
staff member account. If you do not have a dummy staff member already in the
database, this will also create a dummy staff member for you in the database

* **Parameters**

**Required**
```javascript
{
  "comment": [Object] {
    "ticketId": [String],
    "comment": [String]
  }
}
```

* **Success Response**

*JSON* `{"success": true, "commentId": [String]}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "comment":{
        "ticketId": "6",
        "comment": "You're Fired M8"
    }
}
```
#### View All
* **URL**
```
/comment/viewall
```

* **Description**

This endpoint will return the comments for the requested ticket

* **Parameters**

**Required**
```javascript
{
  "ticketId": [String]
}
```
* **Success Response**

*JSON*
```javascript
{
  "success": true,
  "comments": [Array] [
    {
      "comment_id": [String],
      "comment_text": [String],
      "user_id": [String],
      "email": [String],
      "is_its": [String]
    }
  ]
}
```

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "ticketId": "9001"
}
```
---
### User
#### New
* **URL**
```
/user/new
```

* **Description**

This endpoint will create a new user using the supplied information

* **Parameters**

**Required**
```javascript
{
  "user": [Object] {
    "firstName": [String],
    "lastName": [String],
    "email": [String]
  }
}
```
* **Success Response**

*JSON* `{"success": true}`

* **Error Response**

*JSON* `{"success": false}`

* **Sample Call**
```javascript
{
    "user": {
      "firstName": "SMOrc",
      "lastName": "Hufferino",
      "email": "me.go@face.com"
    }
}
```
