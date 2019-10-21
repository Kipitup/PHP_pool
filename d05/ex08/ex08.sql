SELECT
    `last_name`,
    `first_name`,
    DATE_FORMAT(`birthdate`, "%Y-%m-%e") AS `birthdate`
FROM
    `user_card`
WHERE
    `birthdate` LIKE "1989%"
ORDER BY
    `last_name` ASC;
