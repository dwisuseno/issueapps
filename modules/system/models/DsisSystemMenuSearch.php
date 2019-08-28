<?php

namespace app\modules\system\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\system\models\DsisSystemMenu;

/**
 * app\modules\system\models\DsisSystemMenuSearch represents the model behind the search form about `app\modules\system\models\DsisSystemMenu`.
 */
 class DsisSystemMenuSearch extends DsisSystemMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'modul_id'], 'integer'],
            [['name', 'route', 'icon', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DsisSystemMenu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'modul_id' => $this->modul_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'route', $this->route])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
