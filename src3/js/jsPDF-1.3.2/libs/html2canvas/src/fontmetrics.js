var Font = require('./font');

function FontMetrics() {
    this.data = {};
}

FontMetrics.prototype.g Metrics = function(family, size) {
    if (this.data[family + "-" + size] === undefined) {
        this.data[family + "-" + size] = new Font(family, size);
    }
    return this.data[family + "-" + size];
};

module.exports = FontMetrics;
