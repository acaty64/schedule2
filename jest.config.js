module.exports = {
    "testURL": "http://localhost/",
    'testRegex': 'tests/Vue/.*.spec.js$',
    'moduleFileExtensions': [
        'js',
        'json',
        'vue'
    ],
    'transform': {
        '^.+\\.js$': '<rootDir>/node_modules/babel-jest',
        '.*\\.(vue)$': '<rootDir>/node_modules/vue-jest'
        // ,
        // ".+\\.(css|styl|less|sass|scss|png|jpg|ttf|woff|woff2)$": "jest-transform-stub"
    },
    'moduleNameMapper': {
      "^@/(.*)$": "<rootDir>/resources/assets/js/$1"
    }
}