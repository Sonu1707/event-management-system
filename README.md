Certainly! Below is the complete README file for your Event Management System project, including a dedicated section for the API documentation. This will provide clear instructions on how to use the API endpoints available in your application.

```markdown
# Event Management System

## Overview

The Event Management System is a web application designed to facilitate the submission, review, and approval of talk proposals for events. It provides a seamless interface for both speakers and reviewers, allowing for efficient management of proposals and reviews.

## Features

- **User  Roles**: Supports multiple user roles, including speakers and reviewers.
- **Talk Proposals**: Allows speakers to submit proposals with detailed descriptions and file uploads.
- **Review System**: Reviewers can evaluate proposals, provide feedback, and rate submissions.
- **Revision History**: Tracks changes made to proposals, including timestamps and user information.
- **Tagging System**: Categorizes proposals with tags for easy searching and filtering.
- **Real-Time Updates**: Notifies users of new submissions and updates using Laravel Echo and Pusher.
- **API Endpoints**: Provides RESTful API endpoints for fetching reviewers, reviews, and proposal statistics.
- **Dashboard**: A user-friendly dashboard for reviewers to manage and review proposals.

## Technologies Used

- **Backend**: Laravel
- **Frontend**: Blade templates, JavaScript
- **Database**: MySQL
- **Real-Time Notifications**: Pusher, Laravel Echo
- **Testing**: PHPUnit

## Installation

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js and npm
- MySQL

### Steps to Install

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/yourusername/event-management-system.git
   cd event-management-system
   ```

2. **Install Dependencies**:

   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment File**:

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

4. **Configure Database**:

   Update the `.env` file with your database credentials:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations**:

   Run the migrations to create the necessary database tables:

   ```bash
   php artisan migrate
   ```

6. **Seed the Database** (Optional):

   You can seed the database with initial data:

   ```bash
   php artisan db:seed
   ```

7. **Set Up Pusher**:

   Sign up for a Pusher account and create a new app. Update your `.env` file with the Pusher credentials:

   ```env
   BROADCAST_DRIVER=pusher
   PUSHER_APP_ID=your_pusher_app_id
   PUSHER_APP_KEY=your_pusher_app_key
   PUSHER_APP_SECRET=your_pusher_app_secret
   PUSHER_APP_CLUSTER=your_pusher_app_cluster
   ```

8. **Compile Assets**:

   Compile the frontend assets:

   ```bash
   npm run dev
   ```

9. **Start the Application**:

   Start the Laravel development server:

   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

## Directory Structure

The project follows a structured directory layout:

```
event-management-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── TalkProposalController.php
│   │   │   ├── ReviewController.php
│   │   │   ├── SpeakerController.php
│   │   │   └── ReviewerController.php
│   ├── Models/
│   │   ├── Speaker.php
│   │   ├── TalkProposal.php
│   │   ├── Review.php
│   │   └── Revision.php
├── database/
│   ├── migrations/
│   │   ├── create_speakers_table.php
│   │   ├── create_talk_proposals_table.php
│   │   ├── create_reviews_table.php
│   │   └── create_revisions_table.php
├── resources/
│   ├── views/
│   │   ├── proposals/
│   │   │   ├── create.blade.php
│   │   │   └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```

### Explanation of Key Directories and Files

- **app/Http/Controllers/**: Contains the controllers that handle the business logic for talk proposals, reviews, speakers, and reviewers.
  - `TalkProposalController.php`: Manages talk proposal submissions and retrieval.
  - `ReviewController.php`: Handles the review process for talk proposals.
  - `SpeakerController.php`: Manages speaker-related functionalities.
  - `ReviewerController.php`: Manages reviewer-related functionalities and fetching reviewers.

- **app/Models/**: Contains the Eloquent models representing the database tables.
  - `Speaker.php`: Represents the speaker entity.
  - `TalkProposal.php`: Represents the talk proposal entity.
  - `Review.php`: Represents the review entity.
  - `Revision.php`: Represents the revision history of proposals.

- **database/migrations/**: Contains migration files for creating the necessary database tables.
  - `create_speakers_table.php`: Migration for the speakers table.
  - `create_talk_proposals_table.php`: Migration for the talk proposals table.
  - `create_reviews_table.php`: Migration for the reviews table.
  - `create_revisions_table.php`: Migration for the revisions table.

- **resources/views/**: Contains Blade templates for rendering views.
  - `proposals/create.blade.php`: Form for submitting new talk proposals.
  - `proposals/dashboard.blade.php`: Dashboard for reviewers to manage proposals.

- **routes/web.php**: Defines the web routes for the application.

## API Documentation

The application provides several API endpoints for interacting with the system. Below are the key endpoints available:

### Fetch Reviewers

- **Endpoint**: `/api/reviewers`
- **Method**: `GET`
- **Description**: Returns a list of all reviewers.
- **Response**:
  ```json
  [
      {
          "id": 1,
          "name": "Reviewer One",
          " "email": "reviewer1@example.com"
      },
      {
          "id": 2,
          "name": "Reviewer Two",
          "email": "reviewer2@example.com"
      }
  ]
  ```

### Submit Proposal

- **Endpoint**: `/api/proposals`
- **Method**: `POST`
- **Description**: Allows speakers to submit a new talk proposal.
- **Request Body**:
  ```json
  {
      "title": "Talk Title",
      "description": "Detailed description of the talk.",
      "speaker_id": 1,
      "tags": ["tag1", "tag2"]
  }
  ```
- **Response**:
  ```json
  {
      "message": "Proposal submitted successfully.",
      "proposal_id": 1
  }
  ```

### Fetch Proposals

- **Endpoint**: `/api/proposals`
- **Method**: `GET`
- **Description**: Retrieves a list of all submitted proposals.
- **Response**:
  ```json
  [
      {
          "id": 1,
          "title": "Talk Title",
          "description": "Detailed description of the talk.",
          "speaker_id": 1,
          "status": "pending"
      }
  ]
  ```

### Review Proposal

- **Endpoint**: `/api/proposals/{id}/review`
- **Method**: `POST`
- **Description**: Allows reviewers to submit their review for a specific proposal.
- **Request Body**:
  ```json
  {
      "reviewer_id": 1,
      "rating": 5,
      "comments": "Great proposal!"
  }
  ```
- **Response**:
  ```json
  {
      "message": "Review submitted successfully."
  }
  ```

### Fetch Reviews for a Proposal

- **Endpoint**: `/api/proposals/{id}/reviews`
- **Method**: `GET`
- **Description**: Retrieves all reviews for a specific proposal.
- **Response**:
  ```json
  [
      {
          "reviewer_id": 1,
          "rating": 5,
          "comments": "Great proposal!"
      }
  ]
  ```

## Usage

### User Registration and Login

- Users can register and log in to the application.
- After logging in, users can access their respective dashboards based on their roles.

### Submitting Proposals

- Speakers can submit their talk proposals through the submission form.
- Proposals can include detailed descriptions and relevant files.

### Reviewing Proposals

- Reviewers can view submitted proposals, provide feedback, and rate them.
- The review process is streamlined to ensure efficient evaluations.

### Managing Revisions

- Users can track the revision history of proposals, allowing for transparency in the submission process.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your branch to your forked repository.
5. Create a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Thanks to the Laravel community for their support and resources.
- Special thanks to all contributors who help improve this project. ```markdown
# Event Management System

## Overview

The Event Management System is a web application designed to facilitate the submission, review, and approval of talk proposals for events. It provides a seamless interface for both speakers and reviewers, allowing for efficient management of proposals and reviews.

## Features

- **User  Roles**: Supports multiple user roles, including speakers and reviewers.
- **Talk Proposals**: Allows speakers to submit proposals with detailed descriptions and file uploads.
- **Review System**: Reviewers can evaluate proposals, provide feedback, and rate submissions.
- **Revision History**: Tracks changes made to proposals, including timestamps and user information.
- **Tagging System**: Categorizes proposals with tags for easy searching and filtering.
- **Real-Time Updates**: Notifies users of new submissions and updates using Laravel Echo and Pusher.
- **API Endpoints**: Provides RESTful API endpoints for fetching reviewers, reviews, and proposal statistics.
- **Dashboard**: A user-friendly dashboard for reviewers to manage and review proposals.

## Technologies Used

- **Backend**: Laravel
- **Frontend**: Blade templates, JavaScript
- **Database**: MySQL
- **Real-Time Notifications**: Pusher, Laravel Echo
- **Testing**: PHPUnit

## Installation

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js and npm
- MySQL

### Steps to Install

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/yourusername/event-management-system.git
   cd event-management-system
   ```

2. **Install Dependencies**:

   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment File**:

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

4. **Configure Database**:

   Update the `.env` file with your database credentials:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run Migrations**:

   Run the migrations to create the necessary database tables:

   ```bash
   php artisan migrate
   ```

6. **Seed the Database** (Optional):

   You can seed the database with initial data:

   ```bash
   php artisan db:seed
   ```

7. **Set Up Pusher**:

   Sign up for a Pusher account and create a new app. Update your `.env` file with the Pusher credentials:

   ```env
   BROADCAST_DRIVER=pusher
   PUSHER_APP_ID=your_pusher_app_id
   PUSHER_APP_KEY=your_pusher_app_key
   PUSHER_APP_SECRET=your_pusher_app_secret
   PUSHER_APP_CLUSTER=your_pusher_app_cluster
   ```

8. **Compile Assets**:

   Compile the frontend assets:

   ```bash
   npm run dev
   ```

9. **Start the Application**:

   Start the Laravel development server:

   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

## Directory Structure

The project follows a structured directory layout:

```
event-management-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── TalkProposalController.php
│   │   │   ├── ReviewController.php
│   │   │   ├── SpeakerController.php
│   │   │   └── ReviewerController.php
│   ├── Models/
│   │   ├── Speaker.php
│   │   ├── TalkProposal.php
│   │   ├── Review.php
│   │   └── Revision.php
├── database/
│   ├── migrations/
│   │   ├── create_speakers_table.php
│   │   ├── create_talk_proposals_table.php
│   │   ├── create_reviews_table.php
│   │   └── create_revisions_table.php
├── resources/
│   ├── views/
│   │   ├── proposals/
│   │   │   ├── create.blade.php
│   │   │   └── dashboard.blade.php
├── routes/
│   └── web.php
├── .env
├── composer.json
└── README.md
```

### Explanation of Key Directories and Files

- **app/Http/Controllers/**: Contains the controllers that handle the business logic for talk proposals, reviews, speakers, and reviewers.
  - `TalkProposalController.php`: Man ages talk proposal submissions and retrieval.
  - `ReviewController.php`: Handles the review process for talk proposals.
  - `SpeakerController.php`: Manages speaker-related functionalities.
  - `ReviewerController.php`: Manages reviewer-related functionalities and fetching reviewers.

- **app/Models/**: Contains the Eloquent models representing the database tables.
  - `Speaker.php`: Represents the speaker entity.
  - `TalkProposal.php`: Represents the talk proposal entity.
  - `Review.php`: Represents the review entity.
  - `Revision.php`: Represents the revision history of proposals.

- **database/migrations/**: Contains migration files for creating the necessary database tables.
  - `create_speakers_table.php`: Migration for the speakers table.
  - `create_talk_proposals_table.php`: Migration for the talk proposals table.
  - `create_reviews_table.php`: Migration for the reviews table.
  - `create_revisions_table.php`: Migration for the revisions table.

- **resources/views/**: Contains Blade templates for rendering views.
  - `proposals/create.blade.php`: Form for submitting new talk proposals.
  - `proposals/dashboard.blade.php`: Dashboard for reviewers to manage proposals.

- **routes/web.php**: Defines the web routes for the application.

## API Documentation

The application provides several API endpoints for interacting with the system. Below are the key endpoints available:

### Fetch Reviewers

- **Endpoint**: `/api/reviewers`
- **Method**: `GET`
- **Description**: Returns a list of all reviewers.
- **Response**:
  ```json
  [
      {
          "id": 1,
          "name": "Reviewer One",
          "email": "reviewer1@example.com"
      },
      {
          "id": 2,
          "name": "Reviewer Two",
          "email": "reviewer2@example.com"
      }
  ]
  ```

### Submit Proposal

- **Endpoint**: `/api/proposals`
- **Method**: `POST`
- **Description**: Allows speakers to submit a new talk proposal.
- **Request Body**:
  ```json
  {
      "title": "Talk Title",
      "description": "Detailed description of the talk.",
      "speaker_id": 1,
      "tags": ["tag1", "tag2"]
  }
  ```
- **Response**:
  ```json
  {
      "message": "Proposal submitted successfully.",
      "proposal_id": 1
  }
  ```

### Fetch Proposals

- **Endpoint**: `/api/proposals`
- **Method**: `GET`
- **Description**: Retrieves a list of all submitted proposals.
- **Response**:
  ```json
  [
      {
          "id": 1,
          "title": "Talk Title",
          "description": "Detailed description of the talk.",
          "speaker_id": 1,
          "status": "pending"
      }
  ]
  ```

### Review Proposal

- **Endpoint**: `/api/proposals/{id}/review`
- **Method**: `POST`
- **Description**: Allows reviewers to submit their review for a specific proposal.
- **Request Body**:
  ```json
  {
      "reviewer_id": 1,
      "rating": 5,
      "comments": "Great proposal!"
  }
  ```
- **Response**:
  ```json
  {
      "message": "Review submitted successfully."
  }
  ```

### Fetch Reviews for a Proposal

- **Endpoint**: `/api/proposals/{id}/reviews`
- **Method**: `GET`
- **Description**: Retrieves all reviews for a specific proposal.
- **Response**:
  ```json
  [
      {
          "reviewer_id": 1,
          "rating": 5,
          "comments": "Great proposal!"
      }
  ]
  ```

## Usage

### User Registration and Login

- Users can register and log in to the application.
- After logging in, users can access their respective dashboards based on their roles.

### Submitting Proposals

- Speakers can submit their talk proposals through the submission form.
- Proposals can include detailed descriptions and relevant files.

### Reviewing Proposals

- Reviewers can view submitted proposals, provide feedback, and rate them.
- The review process is streamlined to ensure efficient evaluations.

### Managing Revisions

- Users can track the revision history of proposals, allowing for transparency in the submission process.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them.
4. Push your branch to your forked repository.
5. Create a pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Thanks to the Laravel community for their