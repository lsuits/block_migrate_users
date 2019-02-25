# blocks_migrate_users
Migrate user data from one user to another in a single course context.

## Who can use this?
This is limited to a subset of named site administrators.

## Who should use this?
This system should not be used by anyone. It's seriously unsafe and only fits a VERY specific use-case.

## Does it migrate ALL Moodle data?
Not currently. We support the following:
1. Enrollment
1. Logs
1. Events
1. Forum posts
1. Course completion
1. Grades
1. Grade history
1. Assignment submissions
1. Assignment grades
1. Assignment user flags
1. Lesson data
1. Quiz attempts
1. Quiz grades
1. SCORM data
1. Choice data

New modules will be added for LSUOnline as they require them.

## Why does this exist?
LSUOnline requested a way to reset the course for a single user while still maintaining that user's data.
This system allows you to enter the existing user's username along with the new (dummy) user's username to "migrate" the user info from the existing to new user, allowing the existing user to re-take the course as if it was their 1st time.

## Really?
Really.
