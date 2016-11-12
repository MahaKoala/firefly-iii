<?php
/**
 * MonthReportGenerator.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms of the
 * Creative Commons Attribution-ShareAlike 4.0 International License.
 *
 * See the LICENSE file for details.
 */

declare(strict_types = 1);

namespace FireflyIII\Generator\Report\Category;


use Carbon\Carbon;
use FireflyIII\Generator\Report\ReportGeneratorInterface;
use Illuminate\Support\Collection;

/**
 * Class MonthReportGenerator
 *
 * @package FireflyIII\Generator\Report\Category
 */
class MonthReportGenerator implements ReportGeneratorInterface
{
    /** @var  Collection */
    private $accounts;
    /** @var  Collection */
    private $categories;
    /** @var  Carbon */
    private $end;
    /** @var  Carbon */
    private $start;

    /**
     * @return string
     */
    public function generate(): string
    {
        $accountIds = join(',', $this->accounts->pluck('id')->toArray());
        $reportType = 'category';

        // render!
        return view('reports.category.month', compact('accountIds', 'reportType'))
            ->with('start', $this->start)->with('end', $this->end)
            ->with('categories', $this->categories)
            ->render();
    }

    /**
     * @param Collection $accounts
     *
     * @return ReportGeneratorInterface
     */
    public function setAccounts(Collection $accounts): ReportGeneratorInterface
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * @param Collection $categories
     *
     * @return ReportGeneratorInterface
     */
    public function setCategories(Collection $categories): ReportGeneratorInterface
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @param Carbon $date
     *
     * @return ReportGeneratorInterface
     */
    public function setEndDate(Carbon $date): ReportGeneratorInterface
    {
        $this->end = $date;

        return $this;
    }

    /**
     * @param Carbon $date
     *
     * @return ReportGeneratorInterface
     */
    public function setStartDate(Carbon $date): ReportGeneratorInterface
    {
        $this->start = $date;

        return $this;
    }
}