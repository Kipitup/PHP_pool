SELECT
    REVERSE(
        SUBSTRING(
            `phone_number`,
            2,
            LENGTH(phone_number)
        )
    ) AS `enohpelet`
FROM
    `distrib`
WHERE
    `phone_number` LIKE "05%";
